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
            
        ?>
            
        </div>
    </div>

<?php include('partials/footer.php'); ?> 