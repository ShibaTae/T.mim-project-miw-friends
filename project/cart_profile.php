<?php
session_start();
include('backend/condb.php');
$userid = $_SESSION["user_id"];
$sql = "SELECT * FROM tbl_member Where member_id = $userid ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>

<body>
    <?php include('navbar1_profile.php'); ?>
    <?php include('navbar2_profile.php'); ?>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <br>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>เพิ่ม-ลด</th>
                            <th>ลบ</th>
                        </tr>
                        <?php
                        $Total = 0;
                        $sumPrice = 0;
                        $m = 1;
                        for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                            if (($_SESSION["strProductID"][$i]) != "") {
                                $sqli = "SELECT * FROM tbl_product Where p_id = '" . $_SESSION["strProductID"][$i] . "' ";
                                $result = mysqli_query($con, $sqli);
                                $row_pro = mysqli_fetch_array($result);

                                $_SESSION["p_cost"] = $row_pro['p_cost'];
                                $Total = $_SESSION["strQty"][$i];
                                $sum = $Total * $row_pro['p_cost'];
                                $sumPrice = $sumPrice + $sum;
                                $_SESSION["sum_price"] = $sumPrice;
                        ?>
                                <tr>
                                    <td><?= $m ?></td>
                                    <td>
                                        <img src="backend/p_img/<?= $row_pro['p_img'] ?>" width="80" height="100" class="border">
                                        <?= $row_pro['p_name'] ?>
                                    </td>
                                    <td><?= $row_pro['p_cost'] ?></td>
                                    <td><?= $_SESSION["strQty"][$i] ?></td>
                                    <td><?= $sum ?></td>
                                    <td>
                                        <a href="order.php?id=<?= $row_pro['p_id'] ?>" class="btn btn-outline-primary">+</a>
                                        <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                                            <a href="order_del.php?id=<?= $row_pro['p_id'] ?>" class="btn btn-outline-primary">-</a>
                                        <?php } ?>
                                    </td>

                                    <td><a href="pro_delete.php?Line=<?= $i ?>"><img src="Project_Sala/image/delete.png" width="30"></a></td>
                                </tr>
                        <?php
                                $m = $m + 1;
                            }
                        }
                        ?>
                        <tr>
                            <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                            <td class="center"><?= $sumPrice ?></td>
                            <td>บาท</td>
                        </tr>
                    </table>
                    <div style="text-align:right">
                        <a href="product_profile.php"> <button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button> </a>
                        <button type="submit" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" h4 role="alert">
                                ข้อมูลสำหรับการจัดส่งสินค้า
                            </div>
                            รหัสลูกค้า
                            <input name="member_id" class="form-control" placeholder="รหัสลูกค้า" required id="member_id" value="<?= $member_id; ?>">
                            ชื่อ-นามสกุล :
                            <input name="m_name" class="form-control" placeholder="ชื่อ-นามสกุล" required id="m_name" value="<?= $m_name; ?>">
                            ที่อยู่ :
                            <input name="m_address" class="form-control" placeholder="Address" required id="m_address" rows="3" value="<?= $m_address; ?>">
                            เบอร์โทรศัพท์ :
                            <input name="m_tel" class="form-control" placeholder="tel" required id="m_tel" value="<?= $m_tel; ?>">
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            stickyFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function stickyFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>