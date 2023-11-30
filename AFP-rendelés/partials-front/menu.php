<?php  include('config/constants.php');?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigga Nurger</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a title="Logo">
                    <img src="images/logo.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Admin login</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Kezdőlap</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Kategóriák</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Ételek</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>