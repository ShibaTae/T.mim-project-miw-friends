<!DOCTYPE html>
<html>

<head>
  <?php include('h.php');
  error_reporting(error_reporting() & ~E_NOTICE);
  //1. เชื่อมต่อ database:
  include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //2. query ข้อมูลจากตาราง tb_admin:
  $query = "SELECT * FROM tbl_order WHERE Order_status = 1";
  //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
  $result = mysqli_query($con, $query);
  //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
  $row_am = mysqli_fetch_assoc($result);
  ?>


  <head>

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
          <a href="order_yes.php"><button type="button" class="btn btn-outline-success">ชำระเงินแล้ว</button></a>
          <a href="order_no.php"><button type="button" class="btn btn-outline-success">ยังไม่ชำระเงิน</button></a>
          <a href="order_cancel.php"><button type="button" class="btn btn-outline-success">ยกเลิก</button></a>
          <p></p>

          <script>
            $(document).ready(function() {
              $('#example1').DataTable({
                "aaSorting": [
                  [0, 'ASC']
                ],
                //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
              });
            });
          </script>

          <table border="2" class="display table table-bordered" id="example1" align="center">
            <thead>
              <tr class="info" bgcolor='#AED6F1'>
                <th>OrderID Int(10)</th>
                <th>Name Varchar(100)</th>
                <th>Address Varchar(200)</th>
                <th>TelephoneNum Varchar(20)</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Cancel Order</th>
              </tr>
            </thead>
            <?php $sql = "SELECT * FROM tbl_order Order_id by reg_date DESC";
            $status = $row_am['Order_status'];
            do { ?>

              <tr>
                <td><?php echo $row_am['Order_id']; ?></td>
                <td><?php echo $row_am['m_name']; ?></td>
                <td><?php echo $row_am['m_address']; ?></td>
                <td><?php echo $row_am['m_tel']; ?></td>
                <td><?php echo $row_am['total_price']; ?></td>
                <td><?php echo $row_am['reg_save']; ?></td>
                <td>
                  <?php
                  if ($status == 1) {
                    echo "<b style = 'color:blue'> ยังไม่ชำระเงิน </b>";
                  } elseif ($status == 2) {
                    echo "<b style = 'color:green'> ชำระเงินแล้ว </b>";
                  } elseif ($status == 0) {
                    echo "<b style = 'color:red'> ยกเลิก </b>";
                  }
                  ?>
                </td>

                <td><a href="order_pay.php?id=<?php echo $row_am['Order_id']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
                <td><a href="order_del_db.php?id=<?php echo $row_am['Order_id']; ?>" class='btn btn-danger btn-xs' onclick="return confirm('ยันยันการยกเลิก')">ยกเลิก</a> </td>
              </tr>
            <?php } while ($row_am = mysqli_fetch_assoc($result));
             ?>


          </table>
        </div>
      </div>
    </div>
  </body>

</html>