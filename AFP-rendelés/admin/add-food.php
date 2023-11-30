<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Étel hozzáadása</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; // üzenet kiírása
                unset($_SESSION['upload']); // üzenet eltávolítása
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Név: </td>
                    <td>
                    <input type="text" name="title" placeholder="Étel neve">
                    </td>
                </tr>

                <tr>
                    <td>Leírás: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Az étel leírása"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?> 