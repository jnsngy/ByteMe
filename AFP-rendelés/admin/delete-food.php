<?php

    include('../config/constants.php');
    //kep neve van-e vagy nem
    if(isset($_GET['id']) AND isset($_GET['kep_neve']))
    {
        $id=$_GET['id'];
        $kep_neve=$_GET['kep_neve'];

        //kép fájl törlése ha van
        if($kep_neve != "")
        {
            $path = "../images/food/".$kep_neve;

            $remove = unlink($path);
            
            //ha sikertelen a törlés akkor hibaüzenet és folyamat megszakítása
            if($remove==FALSE)
            {
                $_SESSION['upload'] = "<div class='error'>Sikertelen törlés</div>";
                header('location:'.SITEURL.'admin/manage-etel.php');

                die();

            }
        }

        $sql = "DELETE FROM tbl_etel WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='succes'>Sikeres törlés</div>";
            header('location:'.SITEURL.'admin/manage-etel.php');
        }
    }



?>