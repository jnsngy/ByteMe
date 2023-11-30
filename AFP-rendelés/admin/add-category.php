<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //üzenet kiírása
                unset($_SESSION['upload']); //üzenet eltávolítása
            }


        ?>

        <br><br>

        <!-- KAtegória hozzáadás kezdete-->
        <form action="" method="POST" enctype="multipart/form-data">

        table class="tbl-30">
                <tr>
                    <td>Kategória: </td>
                    <td>
                        <input type="text" name="title" placeholder="Kategória neve">
                    </td>
                </tr>

                <tr>
                    <td>Ikon kiválasztása: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>