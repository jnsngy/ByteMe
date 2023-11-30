<?php
    // felhatalmazás
    
    //felhasználó belépett e vagy nem 
    if(!isset($_SESSION['user']))
    {
        //nincs bejelentkezve a felhasználó
        $_SESSION['no-login-message'] = "<div class='error text-center'>A folytatáshoz jelentkezzen be!</div>";
        //login oldalra navigálás
        header('location:'.SITEURL.'admin/login.php');
    }
?>