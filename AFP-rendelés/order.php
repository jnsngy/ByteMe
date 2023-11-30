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
