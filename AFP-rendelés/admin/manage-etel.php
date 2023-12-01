<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Étel irányító</h1>

        <br /><br />

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
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //üzenet kiírása
                unset($_SESSION['upload']); //üzenet eltávolítása
            }
            if(isset($_SESSION['remove-failed']))
            {
                echo $_SESSION['remove-failed']; //üzenet kiírása
                unset($_SESSION['remove-failed']); //üzenet eltávolítása
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; //üzenet kiírása
                unset($_SESSION['update']); //üzenet eltávolítása
            }
        ?>

        <br><br>

        <!-- Étel hozzáadása gomb -->

        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Étel hozzáadása</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Leírás</th>
                <th>Ár</th>
                <th>Ikon</th>
                <th>Top termék</th>
                <th>Van-e készleten</th>
                <th>Szerkesztés</th>
            </tr>

            <?php

                $sql = "SELECT * FROM tbl_etel";

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
                            $title=$rows['nev'];
                            $description=$rows['leiras'];
                            $price=$rows['ar'];
                            $image_name=$rows['kep_nev'];
                            $featured=$rows['jelleg'];
                            $active=$rows['active'];
                            ?>
                            
                            
                            <?php 
                        }
                }
                ?>
        </table>            
    </div>
</div>

<?php include('partials/footer.php'); ?> 