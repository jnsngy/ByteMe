<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Kategória szerkesztése</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))

            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_kategoriak WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['nev'];
                    $current_image = $row['kep_neve'];
                    $featured = $row['jelleg'];
                    $active = $row['van_e'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Kategória nem található</div>";
                    header("location:".SITEURL.'admin/manage-kategoria.php');
                }
            }
            else
            {
                header("location:".SITEURL.'admin/manage-category.php');
            }


        ?>

<form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Név: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jelenlegi ikon: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //kép megjelenítése
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="50px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Nem lett ikon hozzáadva</div>";
                                
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Új ikon: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Top termék: </td>
                    <td>
                        <input <?php if($featured=="Igen"){echo "checked";} ?> type="radio" name="featured" value="Igen"> Igen

                        <input <?php if($featured=="Nem"){echo "checked";} ?> type="radio" name="featured" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td>Van-e készleten: </td>
                    <td>
                        <input <?php if($active=="Igen"){echo "checked";} ?> type="radio" name="active" value="Igen"> Igen
                        <input <?php if($active=="Nem"){echo "checked";} ?> type="radio" name="active" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Kategória frissítése" class="btn-secondary">
                    </td>
                </tr>

                </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                //form-ból adatok megszerzése
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //új kép hozzáadása
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    //van-e elérhető kép 
                    if($image_name != "")
                    {
                        // van

                        //új kép feltöltése

                        $ext = end(explode('.',$image_name));

                        //átnevezés

                        $image_name = "uj_kep_".rand(000, 999).'.'.$ext; //uj_kep.jpg


                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        //kép feltöltése
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //fellett-e töltve vagy nem és átírányítás

                        if($upload==FALSE)
                        {
                            //üzenet
                            $_SESSION['upload'] = "<div class='error'>Képfeltöltés sikertelen</div>";
                            header("location:".SITEURL.'admin/manage-kategoria.php');
                            die();


                        }
                        // régi kép törlése
                        if($current_image != "")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);

                            //törölve lett a kép vagy nem
                            if($remove==FALSE)
                            {
                                $_SESSION['törlés-sikertelen'] = "<div class='error'>Jelenlegi kép törlése sikertelen</div>";
                                header("location:".SITEURL.'admin/manage-kategoria.php');
                                die();
                            }
                        }
                        
                    }