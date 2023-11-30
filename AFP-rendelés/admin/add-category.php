<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //üzenet kiírása
                unset($_SESSION['upload']); //üzenet eltávolítása
            }


        ?>

        <br><br>

        <!-- KAtegória hozzáadás kezdete-->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Kategória: </td>
                    <td>
                        <input type="text" name="title" placeholder="Kategória neve">
                    </td>
                </tr>

                <tr>
                    <td>Ikon kiválasztása: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Top termék: </td>
                    <td>
                        <input type="radio" name="featured" value="Igen"> Igen
                        <input type="radio" name="featured" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td>Van-e készleten: </td>
                    <td>
                        <input type="radio" name="active" value="Igen"> Igen
                        <input type="radio" name="active" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Kategória hozzáadása" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <!-- Kategória hozzáadás vége-->

        <?php
            //az értéket az adatbázisba mentjük
            //submit gomb meglett-e nyomva vagy nem

            if(isset($_POST['submit']))
            {
                //adat fogadása a formból
                $title = $_POST['title'];

                //radio kilett-e választva vagy nem

                if(isset($_POST['featured']))
                {
                    //érték kinyerése a formból
                    $featured = $_POST['featured'];
                }
                else
                {
                    //alap érték beállítása
                    $featured = 'Nem';

                }

                if(isset($_POST['active']))
                {
                    //érték kinyerése a formból

                    $active = $_POST['active'];
                }
                else
                {
                    //alap érték beállítása

                    $active = 'Nem';
                }

                //fájl feltöltése
                
                if(isset($_FILES['image']['name']))
                {
                    //kép feltöltése

                    //feltöltéshez kell a cél mappa és az cél mappa
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {

                    

                        //auto-átnevezése a fájlnak
                        //fájl kiterjesztése meghatározása (jpg, png, gif stb.) "kaja1.jpg"

                        $ext = end(explode('.',$image_name));

                        //átnevezés

                        $image_name = "uj_kep_".rand(000, 999).'.'.$ext; //uj_kep258.jpg

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        //kép feltöltése
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //fellett -e töltve vagy nem és átírányítás

                        if($upload==FALSE)
                        {
                            //üzenet
                            $_SESSION['upload'] = "<div class='error'>Képfeltöltés sikertelen</div>";
                            header("location:".SITEURL.'admin/add-category.php');
                            die();


                        }

                    }

                }
                else
                {
                    //nem töltjük fel a képet és az értéket üresre állítjuk
                    $image_name="";
                }
                
                //sql

                $sql = "INSERT INTO tbl_kategoriak SET
                    nev = '$title',
                    kep_neve = '$image_name',
                    jelleg = '$featured',
                    van_e = '$active'
                ";
