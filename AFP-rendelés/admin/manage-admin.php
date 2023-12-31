<?php include('partials/menu.php'); ?>

//Fő téma

<div class="main-content" >


    <div class="wrapper" >

        <h1>Admin irányító</h1>

        <br /> <br />

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; //üzenet kiírása
                unset($_SESSION['delete']); //üzenet eltávolítása
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; //üzenet kiírása
                unset($_SESSION['update']); //üzenet eltávolítása
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found']; //üzenet kiírása
                unset($_SESSION['user-not-found']); //üzenet eltávolítása
            }
            if(isset($_SESSION['not-match']))
            {
                echo $_SESSION['not-match']; //üzenet kiírása
                unset($_SESSION['not-match']); //üzenet eltávolítása
            }
            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd']; //üzenet kiírása
                unset($_SESSION['change-pwd']); //üzenet eltávolítása
            }
        
        ?>

        <br /><br /><br />


        <!-- Admin hozzáadása gomb -->

        <a href="add-admin.php" class="btn-primary">Admin hozzáadása</a>

        <br /><br /><br />
        <table class="tbl-full">
        <tr>
            <th>ID</th>
            <th>Teljes név</th>
            <th>Felhasználónév</th>
            <th>Szerkesztés</th>
        </tr>

        <?php 

            
                // adminok megjelenítése
                $sql = "SELECT * FROM tbl_admin";
                //végrehajtása a kódnak
                $res = mysqli_query($conn, $sql);

                 //ellenőrzés, hogy végre lett e hajtva
                 if($res==TRUE)
                 {
                     //sorok számolása, hogy van egy adat az adatbázisban
                     $count = mysqli_num_rows($res); 

                     $sn=1; //változó létrehozása a sorszám kezeléséhez

                     if($count >0)

                     {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //adatok kinyerése az adatbázisból while ciklussal

                            $id=$rows['id'];
                            $teljes_nev=$rows['teljes_nev'];
                            $felhasznev=($rows['felhasznev']);
                            ?>
                             <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $teljes_nev; ?></td>
                                    <td><?php echo $felhasznev; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Jelszó változtatás</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Szerkesztés</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Törlés</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        //nincs adatbázisban
                    }
                 }
        
        
        ?>
        </table>
    </div>


</div>


<?php include('partials/footer.php'); ?>
