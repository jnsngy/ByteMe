<?php 

    //constans.php fájl befoglalása
    include('../constans.php');

    //törlendő admin
    $id = $_GET['id'];

    //sqlm a törlés végrehajtására
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //sql kód végrehajtása

    $res = mysqli_query( $conn,$sql );
    


 ?>