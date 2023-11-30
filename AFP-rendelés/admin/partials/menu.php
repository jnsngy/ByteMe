<?php 
include('../config/constants.php');

include('login-check.php'); 

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés - Főoldal</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
    <!--Menü szekció-->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-kategoria.php">Kategória</a></li>
                <li><a href="manage-etel.php">Étel</a></li>
                <li><a href="manage-rendeles.php">Rendelés</a></li>
                <li><a href="logout.php">Kijelentkezés</a></li>
            </ul>
        </div>
        
    </div>