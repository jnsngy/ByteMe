<?php include('partials-front/menu.php');?>

    <!-- keresés kezdete -->
    <section class="food-search text-center">
        <div class="container">

        <?php 

        //a keresési kulcsszó 

        $search = $_POST['search'];
        
        ?>
            
            <h2>Ételek a keresés alapján: <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- keresés vége -->