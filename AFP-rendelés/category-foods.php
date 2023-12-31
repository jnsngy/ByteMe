<?php include('partials-front/menu.php');?>

<?php 

    //id átlett e küldve vagy nem 
    if(isset($_GET['category_id']))
    {
        // kategória id megvan 
        $category_id = $_GET['category_id'];
        // kategória neve az id alapján
        $sql = "SELECT nev FROM tbl_kategoriak WHERE id=$category_id";

        // sql futtatása

        $res = mysqli_query($conn, $sql);

        // érték kinyerése az adatbázisból

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['nev'];
    }
    else
    {
        header('location:'.SITEURL);
    }

?>

    <!-- keresés rész kezdődik -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Ételek a keresés alapján: <a href="#" class="text-white">"<?php echo $category_title?>"</a></h2>

        </div>
    </section>
    <!-- keresés rész vége -->
    <!-- menü kezdete -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ételek</h2>

            <?php

                //sql kód az ételek megjelenítésére a kategória alapján
                $sql2 = "SELECT * FROM tbl_etel WHERE kategoria_id=$category_id";

                // futtatás
                $res2 = mysqli_query($conn, $sql2);

                //sorok számolása

                $count2 = mysqli_num_rows($res2);

                //van e elérhető étel 
                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['nev'];
                        $price = $row2['ar'];
                        $description = $row2['leiras'];
                        $image_name= $row2['kep_nev'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                <?php 
                                    // van e kép 
                                    if($image_name=="")
                                    {
                                        echo "<div class'error'>Ikon nem található</div>";
                                    }
                                    else
                                    {
                                        ?>

                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">

                                        <?php
                                    }
                                ?>
                                </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price; ?></p>
                                    <p class="food-detail">
                                                <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Megrendelés</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Étel nem található</div>";
                }

            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- menü vége -->

    <?php include('partials-front/footer.php');?>