<?php include('partials-front/menu.php');?>

<section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Keresés" required>
                <input type="submit" name="submit" value="Keresés" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- kategóriák kezdete -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Ételek felfedezése</h2>

            <?php 
            //sql az adatok megjelenítéséhez
            $sql = "SELECT * FROM tbl_kategoriak WHERE van_e='Igen'";
            // kód futtatása
            $res = mysqli_query($conn, $sql);
            // sorok számolása hogy van e kategória
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['nev'];
                    $image_name = $row['kep_neve'];
                    ?>

                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 