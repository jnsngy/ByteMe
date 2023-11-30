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
            $path = "../images/category/".$kep_neve;

            $remove = unlink($path);
            
            //ha sikertelen a törlés akkor hibaüzenet és folyamat megszakítása
            if($remove==FALSE)
            {
                $_SESSION['remove'] = "<div class='error'>Sikertelen törlés</div>";
                header('location:'.SITEURL.'admin/manage-kategoria.php');

                die();

            }
        }
