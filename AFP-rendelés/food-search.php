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

    <!-- menü kezdete -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Étel menü</h2>

            <?php 
                //sql a keresett szó alapján megjelenítendő ételekhez

                $sql = "SELECT * FROM tbl_etel WHERE nev LIKE '%$search%' OR leiras LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['nev'];
                        $price = $row['ar'];
                        $description = $row['leiras'];
                        $image_name= $row['kep_nev'];
                        ?>


                <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class'error'>Ikon nem található</div>";
                                        }
                                        else
                                        {
                                            ?>
    
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
    
                                            <?php
                                        }
                                    ?>
                                </div>

