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

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ételek</h2>

            <?php

                // minden aktív étel megjelenítése
                $sql = "SELECT * FROM tbl_Etel WHERE active='Igen'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    // van 
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['nev'];
                        $description = $row['leiras'];
                        $price = $row['ar'];
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
                    // nincs
                    echo "<div class='error'>Étel nem található</div>";
                }

            ?>

            <div class="clearfix"></div>

        </div>
    </section>
    <!-- menü vége -->

    <?php include('partials-front/footer.php');?>