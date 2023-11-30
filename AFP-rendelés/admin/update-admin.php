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
             else
                {
                    // nincs meg az adott sorszámú admin
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

     ?>   
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Teljes név: </td>
                    <td>
                        <input type="text" name="teljes_nev" value="<?php echo $teljes_nev; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Felhasználónév: </td>
                    <td>
                        <input type="text" name="felhasznev" value="<?php echo $felhasznalonev; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Admin szerkesztése" class="btn-secondary">
                    </td>
                </tr> 

            </table>

        </form>

    </div>

</div>
<?php 
    if(isset($_POST['submit']))
    {
        // adatok kinyerése a formból és változtatás
        $id = $_POST['id'];
        $teljes_nev = $_POST['teljes_nev'];
        $felhasznalonev = $_POST['felhasznev'];

        // sql a cseréhez

        $sql = "UPDATE tbl_admin SET
        teljes_nev = '$teljes_nev',
        felhasznev = '$felhasznalonev' 
        WHERE id='$id'
        ";

        // sql végrehajtása

        $res = mysqli_query($conn, $sql);

        // ellenőrzés sikerült e vagy nem
        if($res==TRUE)
        {
            // sikeresen végrehajtva és megváltoztatva az adat
            $_SESSION['update'] = "<div class='succes'>Adatok sikeresen megváltoztatva</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //nem sikerült
            $_SESSION['update'] = "<div class='error'>Adatok változtatása nem sikerült</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>