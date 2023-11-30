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

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?> 