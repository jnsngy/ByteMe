

<?php 

    include('../config/constants.php'); 
    // session destroy
    session_destroy();
    //navigálás
    header('location:'.SITEURL.'admin/login.php');
?>