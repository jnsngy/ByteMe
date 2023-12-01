<?php include('partials/menu.php'); ?>


    <!-- Fő téma -->
    <div class="main-content">
    <div class="wrapper">
            <h1>Irányítópult</h1>
            <br><br>
            
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login']; //üzenet kiírása
                unset($_SESSION['login']); //üzenet eltávolítása
            }
            ?>
            <br><br>

            <div class="col-4 text-center">

            <?php 
                $sql = "SELECT * FROM tbl_kategoriak";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
                <h1><?php echo $count; ?></h1>
                <br />
                Kategóriák
            </div>

            <div class="col-4 text-center">
            <?php 
                $sql2 = "SELECT * FROM tbl_etel";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
                <h1><?php echo $count2; ?></h1>
                <br />
                Ételek
            </div>

            <div class="col-4 text-center">
            <?php 
                $sql3 = "SELECT * FROM tbl_megrendeles";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
                <h1><?php echo $count2; ?></h1>
                <br />
                Összes rendelés
            </div>

            <div class="col-4 text-center">

            <?php 

                $sql4 = "SELECT SUM(teljes) AS Teljes FROM tbl_megrendeles WHERE statusz='Kiszállítva'";

                $res4 = mysqli_query($conn, $sql4);

                $row4 = mysqli_fetch_assoc($res4);

                $össze_bevetel = $row4['Teljes'];

            ?>
                <h1><?php echo $össze_bevetel; ?> Ft</h1>
                <br />
                Bevétel
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>  
