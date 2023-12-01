<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Étel hozzáadása</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; // üzenet kiírása
                unset($_SESSION['upload']); // üzenet eltávolítása
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Név: </td>
                    <td>
                    <input type="text" name="title" placeholder="Étel neve">
                    </td>
                </tr>

                <tr>
                    <td>Leírás: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Az étel leírása"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                
                <tr>
                    <td>Kategória: </td>
                    <td>
                    <select name="category">

                        <?php 
                            //az adatbázisban lévő kategóriák megjelenítése
                            //aktív kategóriák kinyerése

                            $sql = "SELECT * FROM tbl_kategoriak WHERE van_e='Igen'";

                            $res = mysqli_query($conn, $sql);

                            //sorok számolása
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                //van kategóriánk
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    //kategória adatok
                                    $id = $row['id'];
                                    $title = $row['nev'];
                                    ?>
                                        <option value="<?php echo $id ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //nincs kategóriánk
                                ?>
                                <option value="0">Nem található kategória</option>
                                <?php
                            }

                        ?>



                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Ikon kiválasztása: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Top termék </td>
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
                        <input type="submit" name="submit" value="Étel hozzáadása" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
               //kaja hozzáadása, van e fotó kiválasztva, értékek párosítása
               $title = $_POST['title'];
               $description = $_POST['description'];
               $price = $_POST['price'];
               $category = $_POST['category'];

               if(isset($_POST['featured']))
               {
                   $featured = $_POST['featured'];
               }
               else
               {
                   $featured = "Nem";
               }

               if(isset($_POST['active']))
               {
                   $active = $_POST['active'];
               }
               else
               {
                   $active = "Nem";
               }

               if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));

                        //új kép név
                        $image_name = "uj_kaja".rand(0000,9999).".".$ext;

                        //kép eredeti helye
                        $src = $_FILES['image']['tmp_name'];

                        //kép cél helye
                        $dst = "../images/food/".$image_name;

                        //kép feltöltése

                        $upload = move_uploaded_file($src, $dst);

                        //kép fel lett e töltve

                        if($upload==FALSE)
                        {
                            //nem sikerült
                            //átirányítás a hozzáadás oldalra
                            $_SESSION['upload'] = "<div class='error'>Képfeltöltés sikertelen</div>";
                            header("location:".SITEURL.'admin/add-food.php');
                            die();
                        }


                    }
                }

               
               

               

               
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?> 