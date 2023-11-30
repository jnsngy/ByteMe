<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Rendelések szerkesztése</h1>
            <br /><br>

            <?php 
            
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];

                    $sql = "SELECT * FROM tbl_megrendeles WHERE id=$id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);

                        $food = $row['etel'];
                        $price = $row['ar'];
                        $qty = $row['mennyiseg'];
                        $status = $row['statusz'];
                        $customer_name = $row['rendelo_nev'];
                        $customer_contact = $row['rendelo_elerhetoseg'];
                        $customer_email = $row['rendelo_email'];
                        $customer_addres = $row['rendelo_cim'];
                    }
                    else
                    {
                        header('location:'.SITEURL.'admin/manage-rendeles.php');
                    }
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-rendeles.php');
                }
            
            
            ?>

            