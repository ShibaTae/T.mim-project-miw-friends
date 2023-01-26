<?php session_start(); ?>
<?php include('h.php');
include('backend/condb.php'); //เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
isset($_SESSION["user_id"]) ? $userid = $_SESSION["user_id"] : $userid = "";
$sql = "SELECT * FROM tbl_member Where member_id = '$userid' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);
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
        <div class="container-fluid">
            <div class="col-md-12">
                <?php
                error_reporting(error_reporting() & ~E_NOTICE);
                //1. เชื่อมต่อ database:
                include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_order WHERE member_id = '$userid' ";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

                <table border="2" class="display table table-bordered" id="example1" align="center">
                    <thead>
                        <tr class="info" bgcolor='#AED6F1'>
                            <th>OrderID</th>
                            <th>รายละเอียด</th>
                            <th>ราคารวม</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <?php $sql = "SELECT * FROM tbl_order ";
                    do { ?>
                        <tr>
                            <td><?php echo $row_am['Order_id']; ?></td>
                            <td><a href="order_history_detail.php?id=<?php echo $row_am['Order_id']; ?>" class="btn btn-warning btn-xs"> รายละเอียด </a> </td>
                            <td><?php echo $row_am['total_price']; ?></td>
                            <td>
                                <?php
                                if ($row_am['Order_status'] == 1) {
                                    echo "<b style = 'color:blue'> ยังไม่ชำระเงิน </b>";
                                } elseif ($row_am['Order_status'] == 2) {
                                    echo "<b style = 'color:green'> ชำระเงินแล้ว </b>";
                                } elseif ($row_am['Order_status'] == 0) {
                                    echo "<b style = 'color:red'> ยกเลิก </b>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } while ($row_am = mysqli_fetch_array($result)) ?>



                </table>
                <div>
                    *** หากต้องการยกเลิกคำสั่งซื้อให้ติดต่อ 0979515633 ***
                </div>
            </div>
        </div>
        </div>
    </main>
</body>