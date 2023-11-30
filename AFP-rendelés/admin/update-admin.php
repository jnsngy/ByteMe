<?php include('partials/menu.php'); ?>
<div class="main-content" >
    <div class="wrapper" >
        <h1>Admin szerkesztés</h1>
        <br /> <br />

     <?php 
         // törlendő admin ID
         $id = $_GET['id'];

         // sql a törlés végrehajtására
         $sql = "SELECT * FROM tbl_admin WHERE id=$id";

         // sql kód végrehajtása

         $res = mysqli_query($conn, $sql);

         
     
     
     
     ?>   








    </div>

</div>