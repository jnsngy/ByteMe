<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Jelszó változtatás</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
         <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Régi jelszó: </td>
                    <td>
                        <input type="password" name="jelenlegi_jelszo" placeholder="Jelenlegi jelszó">
                    </td>
                </tr>

                <tr>
                    <td>Új jelszó: </td>
                    <td>
                        <input type="password" name="uj_jelszo" placeholder="Új jelszó">
                    </td>
                </tr>

                <tr>
                    <td>Jelszó megerősítése: </td>
                    <td>
                        <input type="password" name="jelszo_megerosit" placeholder="Jelszó megerősítése">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Jelszó megváltoztatása" class="btn-secondary">
                    </td>
                </tr> 
                </table>
        </form>

    </div>
</div>

<?php
    
    //submit gomb meglett-e nyomva vagy nem

    if(isset($_POST['submit']))
    {
        //adat fogadása a formból
        $id=$_POST['id'];
        $jelenlegi_jelszo = md5($_POST['jelenlegi_jelszo']);  //jelszó titkosítás md5 módszerrel
        $uj_jelszo = md5($_POST['uj_jelszo']);
        $jelszo_megerosit = md5($_POST['jelszo_megerosit']);
        // létezik e a jelszó az adatbázisban

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND jelszo='$jelenlegi_jelszo'";


        //sql végrehajtása
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                // az új jelszavak egyeznek-e 
                if($uj_jelszo==$jelszo_megerosit)
                {
                    //jelszó frissítése a db-ben
                    $sql2 = "UPDATE tbl_admin SET
                        jelszo='$uj_jelszo'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE)
                    {
                        //sikeres
                        $_SESSION['change-pwd'] = "<div class='succes'>A jelszó sikeresen megváltozott. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //sikertelen
                        $_SESSION['change-pwd'] = "<div class='error'>A jelszó megváltoztatása nem sikerült. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['not-match'] = "<div class='error'>A megadott jelszavak nem egyeznek. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['user-not-found'] = "<div class='error'>A felhasználó nem található. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }



    }

?>



<?php include('partials/footer.php'); ?>
