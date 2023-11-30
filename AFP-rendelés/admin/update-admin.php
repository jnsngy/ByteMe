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

         if($res==TRUE)
         {
             // sikeres, törlődött
             // üzenet kiírására
             $count = mysqli_num_rows($res);
             // van e adat ellenrzése
             if($count==1)
             {
                 //van adat
                 $row=mysqli_fetch_assoc($res);

                 $teljes_nev = $row['teljes_nev'];
                 $felhasznalonev = $row['felhasznev'];

             }
        }
     
     
     
     ?>   








    </div>

</div>