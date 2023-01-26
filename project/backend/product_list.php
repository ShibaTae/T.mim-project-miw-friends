<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_product ORDER BY p_id ASC" or die("Error:" . mysqli_error($con));
                $query = "SELECT * FROM tbl_product as p INNER JOIN tbl_type  as t ON p.type_id=t.type_id ORDER BY p.p_id DESC" or die("Error:" . mysqli_error($con));
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="example1" align="center">
  <thead>
    <tr class="info" bgcolor = '#AED6F1'>    
    <th>ProductID Int(11)</th>
    <th>Type Int(100)</th>
    <th>ProductName Varchar</th>
    <th>Img Varchar(200)</th>
    <th>Cost Int(11)</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['p_id']; ?></td>
      <td><?php echo $row_am['type_name']; ?></td>
      <td><?php echo $row_am['p_name']; ?></td>
      <td><?php echo "<img src='p_img/".$row_am["p_img"]."' width='100'>";?></td>
      <td ><?php echo $row_am['p_cost']; ?></td>
      <td><a href="product.php?act=edit&ID=<?php echo $row_am['p_id']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
      <td><a href="product_del_db.php?ID=<?php echo $row_am['p_id']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 