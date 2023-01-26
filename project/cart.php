<?php
session_start();
include('backend/condb.php');
$userid = $_SESSION["user_id"];
$sql = "SELECT * FROM tbl_member Where member_id = $userid ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);
?>
<!DOCTYPE html>
<html>

<body>
    <?php include('navbar1.php'); ?>
    <?php include('navbar2.php'); ?>
    <div class="container">
        <form id="form1" method="POST" action="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <br>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>รวม</th>
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
                                $sumPrice = number_format($sumPrice);

                        ?>
                                <tr>
                                    <td><?= $m ?></td>
                                    <td><?= $row_pro['p_name'] ?></td>
                                    <td><?= $row_pro['p_cost'] ?></td>
                                    <td><?= $_SESSION["strQty"][$i] ?></td>
                                    <td><?= $sumPrice ?></td>
                                </tr>
                        <?php
                                $m = $m + 1;
                            }
                        }
                        ?>
                    </table>
                    <div style="text-align:right">
                        <button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button> |
                        <button type="button" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button>
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