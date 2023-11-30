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