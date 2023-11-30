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

            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Étel neve</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td><b> <?php echo $price; ?> Ft </b></td>
                </tr>

                <tr>
                    <td>Mennyiség</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Státusz</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Megrendelve"){echo "selected";} ?> value="Megrendelve">Megrendelve</option>
                            <option <?php if($status=="Kiszállítás alatt"){echo "selected";} ?> value="Kiszállítás alatt">Kiszállítás alatt</option>
                            <option <?php if($status=="Kiszállítva"){echo "selected";} ?> value="Kiszállítva">Kiszállítva</option>
                            <option <?php if($status=="Törölve"){echo "selected";} ?> value="Törölve">Törölve</option>
                        </select>
                    </td>
                </tr>
                <tr>