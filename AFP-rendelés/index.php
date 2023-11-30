<?php include('partials-front/menu.php');?>



    <!-- keresés -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Keresés" required>
                <input type="submit" name="submit" value="Keresés" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- keresés vége -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order']; //üzenet kiírása
            unset($_SESSION['order']); //üzenet eltávolítása
        }
    ?>
   
    <!-- kategóriák kezdete -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Ételek felfedezése</h2>

            <?php
                //sql az adatok megjelenítéséhez
                $sql = "SELECT * FROM tbl_kategoriak WHERE van_e='Igen' AND jelleg='Igen' LIMIT 3";
                // kód futtatása
                $res = mysqli_query($conn, $sql);
                // sorok számolása hogy van e kategória
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['nev'];
                        $image_name = $row['kep_neve'];
                        ?>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                            <?php 
                                    if($image_name=="")
                                    {
                                        // nincs ikon
                                        echo "<div class='error'>Ikon nem elérhető</div>";
                                    }
                                    else
                                    {
                                        // van ikon
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Nincs kategória hozzáadva</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- kategória rész vége -->

     <!-- étel menü -->
     <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ételek</h2>

            <?php

                // ételek adatbázisból történő megjelenítése ha az aktív és top
                $sql2 = "SELECT * FROM tbl_etel WHERE active='Igen' AND jelleg='Igen' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['nev'];
                        $price = $row['ar'];
                        $description = $row['leiras'];
                        $image_name = $row['kep_nev'];
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