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