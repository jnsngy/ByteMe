<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Kategória hozzáadása</h1>

        <br /><br />

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove']; //üzenet kiírása
                unset($_SESSION['remove']); //üzenet eltávolítása
            }