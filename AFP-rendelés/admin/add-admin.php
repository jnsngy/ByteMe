<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Admin hozzáadása</h1>

        <br /><br />


        <?php 
            if(isset($_SESSION['add']))
            {
                echo''.$_SESSION['add'].''; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
        ?>

        <form action="" method="POST" >
            
            <table class="tbl-30">
                <tr>
                    <td>Teljes név: </td>
                    <td>
                        <input type="text" name="teljes_nev" placeholder="Írd be a teljes neved"  >
                    </td>
                </tr>

                <tr>
                    <td>Felhasználónév: </td>
                    <td>
                        <input type="text" name="felhasznev" placeholder="Írd be a felhasználóneved">
                    </td>
                </tr>

                <tr>
                    <td>Jelszó: </td>
                    <td>
                        <input type="password" name="jelszo" placeholder="Írd be a jelszavad">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Admin hozzáadása" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>

</div>
<?php include('partials/footer.php'); ?>

<?php 
    //az értéket az adatbázisba mentjük
    //submit gomb meglett-e nyomva vagy nem
    
    if(isset($_POST['submit']))
    {
        //adat fogadása a formból
        $teljes_nev = $_POST['teljes_nev'];
        $felhasznalonev = $_POST['felhasznev'];
        $jelszo = md5($_POST['jelszo']);  //jelszó titkosítás md5 módszerrel

        //sql az adatbázisba mentéshez
        $sql = "INSERT INTO tbl_admin SET
        teljes_nev='$teljes_nev',
        felhasznev='$felhasznalonev',
        jelszo='$jelszo'
    ";

    //sql utasítások végrehajtása és mentése adatbázisba
    $res = mysqli_query($conn, $sql) or die (mysqli_error());

        //végrehajtás ellenőrzése, üzenet kiírása eredményről
        if($res == TRUE){
            //Bekerült;
            //session változó az üzenethez
            $_SESSION['add'] = "<div class='succes'>Admin sikeresen hozzáadva!</div>";
            //elnavigálás az admin hozzáadás fülre
            header("location:".SITEURL."admin/manage-admin.php");
        }
    }
?>