<?php
session_start();
include('backend/condb.php');
include('h.php');
$sql = "SELECT * FROM tbl_order WHERE Order_id = '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($con, $sql);
$rs =  mysqli_fetch_array($result);
$total_price = $rs['total_price'];
$_SESSION['order'] = $rs['Order_id'];
?>

<body>
    <div>
        <!--Top Bar-->
        <?php include('navbar1_profile.php'); ?>
        <?php include('navbar2_profile.php'); ?>
        <br>
        <form name="addproduct" action="slip.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary h4 text-center mt-4" role="alert">
                            invoice
                        </div>
                        เลขที่การสั่งซื้อ : <?= $rs['Order_id']; ?><br>
                        ชื่อ-นามสกุล : <?= $rs['m_name']; ?><br>
                        ที่อยู่การจัดส่ง : <?= $rs['m_address']; ?><br>
                        เบอร์โทรศัพท์ : <?= $rs['m_tel']; ?><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวนที่สั่งซื้อ</th>
                                    <th>ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql1 = "SELECT * FROM tbl_order_detail as d,tbl_product as p WHERE d.p_id = p.p_id and Order_id = '" . $_SESSION["order_id"] . "' ";
                                $result1 = mysqli_query($con, $sql1);
                                while ($row = mysqli_fetch_array($result1)) {
                                ?>
                                    <tr>
                                        <td><?= $row['p_id'] ?></td>
                                        <td><?= $row['p_name'] ?></td>
                                        <td><?= $row['p_cost'] ?></td>
                                        <td><?= $row['orderQty'] ?></td>
                                        <td><?= $row['Total'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <h6 class=" col-md-12 text-right">รวมเป็นเงิน <?= number_format($total_price) ?> บาท </h6>
                    </div>
                </div>

                <div>
                    ธนาคาร:กสิกรไทย <br>
                    ชื่อบัญชี:สรัลรัตน์ ศุภรัตน์ <br>
                    เลขบัญชี:0703174639 <br>
                    ***กรุณาโอนเงินภายในวันสั่งซื้อ***
                </div>

                <div class="col-sm-4">
                    <h6> แนบหลักฐานการโอน </h6>
                    <input type="file" name="img" id="img" class="form-control" accept="image/png, image/gif, image/jpeg" multiple required />
                
                </div>

                

                <br>
            
                <div class="text-center">
                <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
                    <a href="cart_profile.php" class="btn btn-success">Back</a>
                </div>
            </div>
        </form>

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
    </div>
</body>