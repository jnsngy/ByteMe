<?php
    // session start
    session_start();



    //konstansok készítése az ismétlés elkerülése végett
    define('SITEURL', 'http://localhost:8080/AFP-rendelés/'); //itt érhető el az oldal
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'rendeles');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // ha nem sikerül megszakítja 
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //adatbázis kiválasztása

    
?>
