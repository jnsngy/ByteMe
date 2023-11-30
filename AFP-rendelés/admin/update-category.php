<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Kategória szerkesztése</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_kategoriak WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['nev'];
                    $current_image = $row['kep_neve'];
                    $featured = $row['jelleg'];
                    $active = $row['van_e'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Kategória nem található</div>";
                    header("location:".SITEURL.'admin/manage-kategoria.php');
                }
            }
            else
            {
                header("location:".SITEURL.'admin/manage-category.php');
            }


        ?>