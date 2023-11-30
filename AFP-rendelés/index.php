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
    <!-- keresés vége -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order']; //üzenet kiírása
            unset($_SESSION['order']); //üzenet eltávolítása
        }
    ?>
    