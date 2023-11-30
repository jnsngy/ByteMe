<?php include('partials-front/menu.php');?>

<?php 

    //id átlett e küldve vagy nem 
    if(isset($_GET['category_id']))
    {
        // kategória id megvan 
        $category_id = $_GET['category_id'];
        // kategória neve az id alapján
        $sql = "SELECT nev FROM tbl_kategoriak WHERE id=$category_id";

        // sql futtatása

        $res = mysqli_query($conn, $sql);

        // érték kinyerése az adatbázisból

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['nev'];