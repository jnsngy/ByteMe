<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Rendelések kezelése</h1>

            <br /><br /><br />

            <?php 
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //üzenet kiírása
                    unset($_SESSION['update']); //üzenet eltávolítása
                }
            ?>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Étel</th>
                    <th>Ár</th>
                    <th>Mennyiség</th>
                    <th>Teljes ár</th>
                    <th>Rendelés dátum</th>
                    <th>Státusz</th>
                    <th>Megrendelő neve</th>
                    <th>Megrendelő elérhetősége</th>
                    <th>Megrendelő email</th>
                    <th>Megrendelő címe</th>
                    <th>Szerkesztés</th>
                </tr>
                
                <?php 
                
                    $sql = "SELECT * FROM tbl_megrendeles ORDER BY id DESC"; // legfrissebb megrendelés elsőként
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    $sn = 1;

                    if($count>0)
                    {
                        // megrendelés elérhető
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $food = $row['etel'];
                            $price = $row['ar'];
                            $qty = $row['mennyiseg'];
                            $total = $row['teljes'];
                            $order_date = $row['rendeles_datum'];
                            $status = $row['statusz'];
                            $customer_name = $row['rendelo_nev'];
                            $customer_contact = $row['rendelo_elerhetoseg'];
                            $customer_email = $row['rendelo_email'];
                            $customer_addres = $row['rendelo_cim'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>

                                <td>
                                    <?php
                                        if($status=="Megrendelve")
                                        {
                                            echo "<label style='color: purple;'>$status</label>";
                                        }
                                        elseif($status=="Kiszállítás alatt")
                                        {
                                            echo "<label style='color: orange;'>$status</label>";
                                        }
                                        elseif($status=="Kiszállítva")
                                        {
                                            echo "<label style='color: green;'>$status</label>";
                                        }
                                        elseif($status=="Törölve")
                                        {
                                            echo "<label style='color: red;'>$status</label>";
                                        }
                                    ?>
                                </td>

                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_addres; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary"" class="btn-secondary">Szerkesztés</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        // nincs megrendelés

                        echo "<tr><td colspan='12' class='error'>Nincs elérhető megrendelés</td></tr>";
                    }
                
                ?>

                

                
            </table>
        </div>
    </div>

<?php include('partials/footer.php'); ?> 
