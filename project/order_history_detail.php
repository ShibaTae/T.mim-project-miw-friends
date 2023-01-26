<?php session_start(); ?>
<?php include('h.php');
include('backend/condb.php'); //เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
$order_id = $_REQUEST["id"];
$sql = "SELECT * FROM tbl_order WHERE Order_id = '$order_id' ";
$result = mysqli_query($con, $sql);
$rs =  mysqli_fetch_assoc($result);
$total_price = $rs['total_price'];
?>

<body>

    <div>
        <?php include('navbar1_profile.php'); ?>
        <?php include('navbar2_profile.php'); ?>
        <div class="topNav">
            <a href="account.php" class="aboutUs">Account</a>
            <a href="order_history.php" class="aboutUs">Order history</a>
            <!--<a href="invoice.php" class="aboutUs">Order History</a>-->
        </div>
    </div>
    <main>
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
                                $sql1 = "SELECT * FROM tbl_order_detail as d,tbl_product as p WHERE d.p_id = p.p_id and Order_id = '$order_id' ";
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
                <?php $sql = "SELECT * FROM slip WHERE Order_id = '$order_id' ";
                $result2 = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
                $row = mysqli_fetch_array($result2);
                ?>
                <div class="col-sm-4">
                    <h6> แนบหลักฐานการโอน </h6>
                    <img src="img/<?php echo $row['img']; ?>" width="100px">
                    <input type="file" name="img" id="img" class="form-control" accept="image/png, image/gif, image/jpeg" multiple required />
                </div>

                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
                    <a href="order_history.php" class="btn btn-success">Back</a>
                </div>
            </div>
        </form>
    </main>
</body>