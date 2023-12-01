<?php include('partials/menu.php'); ?>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];

        $featured = $_POST['featured'];
        $active = $_POST['active'];

        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {
                $val = explode('.', $image_name);
                $ext = end($val);

                $image_name = "uj_kaja".rand(0000,9999).".".$ext;

                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "../images/food/".$image_name;

                $upload = move_uploaded_file($src_path, $dest_path);

                if($upload==FALSE)
                {
                    $_SESSION['upload'] = "<div class='error'>Sikertelen képfeltöltés</div>";
                    header('location:'.SITEURL.'admin/manage-etel.php');
                    die();
                }

                if($current_image!="")
                {
                    // van jelenlegi ikon
                    $remove_path = "../images/food/".$current_image;

                    $remove = unlink($remove_path);

                    //törölve lett e vagy nem

                    if($remove==FALSE)
                    {
                        // nem sikerült
                        $_SESSION['remove-failed'] = "<div class='error'>Sikertelen törlés</div>";
                        header('location:'.SITEURL.'admin/manage-etel.php');
                        die();
                    }
                }
            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }

        $sql3 = "UPDATE tbl_etel SET
            nev = '$title',
            leiras = '$description',
            ar = $price,
            kep_nev = '$image_name',
            kategoria_id = '$category',
            jelleg = '$featured',
            active = '$active'
            WHERE id=$id

        ";

        $res3 = mysqli_query($conn, $sql3);

        if($res3==TRUE)
        {
            $_SESSION['update'] = "<div class='succes'>Sikeres frissítés</div>";
            header('location:'.SITEURL.'admin/manage-etel.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Sikertelen frissítés</div>";
            header('location:'.SITEURL.'admin/manage-etel.php');
        }
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Étel frissítése</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql2 = "SELECT * FROM tbl_etel WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);

                $row2 = mysqli_fetch_assoc($res2);

                $title = $row2['nev'];
                $description = $row2['leiras'];
                $price = $row2['ar'];
                $current_image = $row2['kep_nev'];
                $current_category = $row2['kategoria_id'];
                $featured = $row2['jelleg'];
                $active = $row2['active'];

            }
            else
            {
                header('location:'.SITEURL.'admin/manage-etel.php');
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
                    <td>Leírás: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Jelenlegi ikon: </td>
                    <td>
                        <?php
                            if($current_image == "")
                            {
                                // nincs kép
                                echo "<div class='error'>Nincs elérhető ikon</div>";
                            }
                            else
                            {
                                // van kép
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="100px">
                                <?php
                            }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Új ikon: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Kategória: </td>
                    <td>
                        <select name="category">

                        <?php
                            //kategóriák megszerezése ami aktív
                            $sql = "SELECT * FROM tbl_kategoriak WHERE van_e='Igen'";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['nev'];
                                    $category_id = $row['id'];
                                    
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Kategória nem található</option>";
                                
                            }

                        ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Top termék: </td>
                    <td>
                        <input <?php if($featured=='Igen') {echo "checked";} ?> type="radio" name="featured" value="Igen"> Igen
                        <input <?php if($featured=='Nem') {echo "checked";} ?> type="radio" name="featured" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td>Van-e készleten: </td>
                    <td>
                        <input <?php if($active=='Igen') {echo "checked";} ?> type="radio" name="active" value="Igen"> Igen
                        <input <?php if($active=='Nem') {echo "checked";} ?> type="radio" name="active" value="Nem"> Nem
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>