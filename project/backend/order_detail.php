<!DOCTYPE html>
<html>

<head>
  <?php include('h.php');
  error_reporting(error_reporting() & ~E_NOTICE);
  //1. เชื่อมต่อ database:
  include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //2. query ข้อมูลจากตาราง tb_admin:
  $order_id = $_REQUEST["id"];
  $query = "SELECT * FROM tbl_order_detail WHERE Order_id = '$order_id' ";
  //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
  $result = mysqli_query($con, $query);
  //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
  $row_am = mysqli_fetch_assoc($result);
  ?>



<body>
  <div class="container-fluid">
    <?php include('navbar.php'); ?>
    <p></p>
    <div class="row">
      <div class="col-md-3">
        สวัสดี คุณ <?php echo $m_name; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_left.php'); ?>
        <!-- Content Wrapper. Contains page content -->
      </div>

      <div class="col-md-9">
        <table border="2" class="display table table-bordered" id="example1" align="center">
          <thead>
            <tr class="info" bgcolor='#AED6F1'>
              <th>OrderID Int(10)</th>
              <th>Product ID</th>
              <th>Cost</th>
              <th>จำนวน</th>
            </tr>
          </thead>
          <?php $sql = "SELECT * FROM tbl_order_detail";
          do { ?>

            <tr>
              <td><?php echo $row_am['Order_id']; ?></td>
              <td><?php echo $row_am['p_id']; ?></td>
              <td><?php echo $row_am['p_cost']; ?></td>
              <td><?php echo $row_am['orderQty']; ?></td>
            </tr>
          <?php } while ($row_am = mysqli_fetch_array($result)) ?>
        </table>
        <?php $sql = "SELECT * FROM slip WHERE Order_id = '$order_id' ";
        $result2 = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
        $row = mysqli_fetch_array($result2);
        ?>
        <div class="col-sm-4">
          <h6> หลักฐานการโอน </h6>
          <img src="../img/<?php echo $row['img']; ?>" width="300px">
        </div>
      </div>
    </div>
  </div>
</body>

</html>