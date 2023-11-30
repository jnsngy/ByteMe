<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="login">
        <h1 class="text-center">Bejelentkezés</h1> <br><br>

        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login']; //üzenet kiírása
                unset($_SESSION['login']); //üzenet eltávolítása
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message']; //üzenet kiírása
                unset($_SESSION['no-login-message']); //üzenet eltávolítása
            }
        ?>

        <br><br>

         <!-- bejelentkezés form -->
         <form action="" method="POST" class="text-center">
            Felhasználónév: <br>
            <input type="text" name="username" placeholder="Felhasználónév megadása"><br><br>
            Jelszó: <br>
            <input type="password" name="password" placeholder="Jelszó megadása"><br><br>

            <input type="submit" name="submit" value="Bejelentkezés" class="btn-primary"><br><br>

        </form>


    </div>
</body>
</html>

<?php
    // meglett e nyomva a gomb
    if(isset($_POST['submit']))
    {
        //adatok kinyerése a login formból
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql a felhasznev és jelszó létezik-e 

        $sql = "SELECT * FROM tbl_admin WHERE felhasznev='$username' AND jelszo='$password'";

        //sql végrehajtása

        $res = mysqli_query($conn, $sql);

        // ellenőrzés, hogy a felhaszná létezik-e
        $count = mysqli_num_rows($res);
        