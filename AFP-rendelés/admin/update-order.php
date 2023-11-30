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
                <td>Megrendelő neve: </td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Megrendelő elérhetősége: </td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Megrendelő email: </td>
                        <td>
                            <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Megrendelő címe: </td>
                        <td>
                            <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_addres; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <input type="submit" name="submit" value="Rendelés frissítése" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>

            <?php 
                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;

                    $status = $_POST['status'];

                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['customer_contact'];
                    $customer_email = $_POST['customer_email'];
                    $customer_address = $_POST['customer_address'];

                    $sql2 = "UPDATE tbl_megrendeles SET
                        mennyiseg = $qty,
                        teljes = $total,
                        statusz = '$status',
                        rendelo_nev = '$customer_name',
                        rendelo_elerhetoseg = '$customer_contact',
                        rendelo_email = '$customer_email',
                        rendelo_cim = '$customer_address'
                        WHERE id=$id
                    ";
                    