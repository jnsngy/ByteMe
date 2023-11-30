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