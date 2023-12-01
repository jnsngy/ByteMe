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
            
        </div>
    </div>

<?php include('partials/footer.php'); ?> 