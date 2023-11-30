<?php 

    //constans.php fájl befoglalása
    include('../constans.php');

    //törlendő admin
    $id = $_GET['id'];

    //sqlm a törlés végrehajtására
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //sql kód végrehajtása

    $res = mysqli_query( $conn,$sql );


    if($res==TRUE)
    {
        // sikeres, törlődött
        // üzenet kiírására
        $_SESSION['delete'] = "<div class='succes'>Admin törölve</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    } else{
        //nem sikerült, nem törlődött
        $_SESSION['delete'] = "<div class='error' >Admin törlése nem sikerült!</div>";
        header('location:'.SITEURL.'admin/manage_admin.php');
    }

 ?>