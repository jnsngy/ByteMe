<?php include('partials-front/menu.php');?>

<?php 

    //van e étel id
    if(isset($_GET['food_id']))
    {
        // étel id és adatok a kiválasztott ételről
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM tbl_etel WHERE id=$food_id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // van adatunk 
            $row = mysqli_fetch_assoc($res);
            $title = $row['nev'];
            $price = $row['ar'];
            $image_name = $row['kep_nev'];

        }
        else
        {
            // nincs adatunk 
            header('location:'.SITEURL);
        }
    }
    else
    {
        // átirányítás a főoldalra
        header('location:'.SITEURL);
    }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">A megrendeléshez töltse ki az alábbi űrlapot!</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend class="inline">Kiválasztott étel</legend>

                    <div class="food-menu-img">
                    <?php 

                        //van e ikon vagy nem 
                        if($image_name=="")
                        {
                            //nincs kép
                            echo "<div class='error'>Ikon nem elérhető</div";
                        }
                        else
                        {
                            //van kép 
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                            <?php
                        }


                        ?>   

                    </div>
                        
                        <div class="food-menu-desc">
                            <h3><?php echo $title; ?></h3>
                            <input type="hidden" name="food" value="<?php echo $title; ?>">

                            <p class="food-price"><?php echo $price; ?> Ft</p>
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                            
                        </div>

                    </fieldset>

                    <fieldset>
                    <legend class="inline">Rendelés adatai</legend>
                    <div class="order-label">Teljes név</div>
                    <input type="text" name="full-name" placeholder="pl. Vnév KNév" class="input-responsive" required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="contact" placeholder="pl. 06301234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pl. x.y@gmail.com" class="input-responsive" required>

                    <div class="order-label">Cím</div>
                    <textarea name="address" rows="10" placeholder="pl. Város, Utca, Házszám" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Rendeles leadása" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                                    
                // submit meglett e nyomva vagy nem
                if(isset($_POST['submit']))
                {
                    //meglett
                    // adatok megszerzése a form-ból 

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // össz ár mennyiség * ár

                    $order_date = date("Y-m-d h:i:sa"); // rendelés dátum 

                    $status = "Megrendelve"; //megrendelve, kiszállítás alatt, kiszállítva, törölve 

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_addres = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_megrendeles SET
                        etel = '$food',
                        ar = $price,
                        mennyiseg = '$qty',
                        teljes = $total,
                        rendeles_datum = '$order_date',
                        statusz = '$status',
                        rendelo_nev = '$customer_name',
                        rendelo_elerhetoseg = '$customer_contact',
                        rendelo_email = '$customer_email',
                        rendelo_cim = '$customer_addres'
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == TRUE)
                    {
                        $_SESSION['order'] = "<div class='succes text-center'>Sikeres megrendelés</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Sikertelen megrendelés!</div>";
                        header('location:'.SITEURL);
                    }

                    }


                    ?>

                    </div>
                    </section>
                    <!-- keresés vége -->

                    <?php include('partials-front/footer.php');?>