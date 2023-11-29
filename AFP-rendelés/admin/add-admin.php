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

        <form action="" method="POST" >
            
            <table class="tbl-30">
                <tr>
                    <td>Teljes név: </td>
                    <td>
                        <input type="text" name="teljes_nev" placeholder="Írd be a teljes neved"  >
                    </td>
                </tr>

                <tr>
                    <td>Felhasználónév: </td>
                    <td>
                        <input type="text" name="felhasznev" placeholder="Írd be a felhasználóneved">
                    </td>
                </tr>

                <tr>
                    <td>Jelszó: </td>
                    <td>
                        <input type="password" name="jelszo" placeholder="Írd be a jelszavad">
                    </td>
                </tr>

            </table>



        </form>
    </div>

</div>