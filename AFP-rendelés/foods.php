<?php include('partials-front/menu.php');?>
<!-- keresés -->
<section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Keresés" required>
                <input type="submit" name="submit" value="Keresés" class="btn btn-primary">
            </form>

        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ételek</h2>

            <?php

                // minden aktív étel megjelenítése
                $sql = "SELECT * FROM tbl_Etel WHERE active='Igen'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                