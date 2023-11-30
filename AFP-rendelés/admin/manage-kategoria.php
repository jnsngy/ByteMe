<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Kategória hozzáadása</h1>

        <br /><br />

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove']; //üzenet kiírása
                unset($_SESSION['remove']); //üzenet eltávolítása
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; //üzenet kiírása
                unset($_SESSION['delete']); //üzenet eltávolítása
            }
            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found']; //üzenet kiírása
                unset($_SESSION['no-category-found']); //üzenet eltávolítása
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; //üzenet kiírása
                unset($_SESSION['update']); //üzenet eltávolítása
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //üzenet kiírása
                unset($_SESSION['upload']); //üzenet eltávolítása
            }
            if(isset($_SESSION['törlés-sikertelen']))
            {
                echo $_SESSION['törlés-sikertelen']; //üzenet kiírása
                unset($_SESSION['törlés-sikertelen']); //üzenet eltávolítása
            }
            

        ?>

        <br><br>

        <!-- Kategória hozzáadása gomb -->

        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Kategória hozzáadása</a>

        <br /><br /><br />
        <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Ikon</th>
                    <th>Top termék</th>
                    <th>Van-e készleten</th>
                    <th>Szerkesztés</th>
                </tr>

                <?php
                    // kategóriák megjelenítése
                    $sql = "SELECT * FROM tbl_kategoriak";
                    //végrehajtása a kódnak
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res); 

                    $sn=1; //változó létrehozása a sorszám kezeléséhez
                    if($count>0)
                    {
                        //van adat
                        while($rows=mysqli_fetch_assoc($res))
                            {
                                //adatok kinyerése az adatbázisból while ciklussal

                                $id=$rows['id'];
                                $nev=$rows['nev'];
                                $kep_neve=$rows['kep_neve'];
                                $featured=$rows['jelleg'];
                                $active=$rows['van_e'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $nev; ?></td>
                                    <td>
                                        <?php 
                                        //van e kép vagy nincs
                                            if($kep_neve!="")
                                            {
                                                //kép megjelenítése
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $kep_neve;?>" width="50px">

                                                <?php
                                            }
                                            else
                                            {
                                                //nincs kép
                                                echo "<div class='error'><Nem lett hozzáadva kép</div>";
                                            }
                                         ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">Szerkesztés</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&kep_neve=<?php echo $kep_neve;?>" class="btn-danger">Törlés</a>
                                    </td>
                                </tr>

                                <?php 
                            }
                    }
                    else
                    {
                        //nincs adat
                        ?>
                        <tr>
                            <td colspan="6"><div class="error">Nem lett hozzáadva kategória.</div></td>
                        </tr>
                        <?php
                    }

                    
                    
                    

                ?>
            </table>
        </div>
    </div>

<?php include('partials/footer.php'); ?> 