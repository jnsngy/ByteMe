<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Admin hozzáadása</h1>

        <br /><br />


        <?php 
            if(isset($_SESSION['add']))
            {
                echo''.$_SESSION['add'].''; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }


         ?>
    </div>

</div>