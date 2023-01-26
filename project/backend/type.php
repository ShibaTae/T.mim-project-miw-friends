<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
error_reporting(0);
?>
<head>
  <body>
    <div class="container-fluid">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
        <div class="col-md-3">
        สวัสดี คุณ <?php echo $m_name; ?>
        <!-- Left side column. contains the logo and sidebar -->
            <?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
        </div>

        <div class="col-md-9">
            <a href="type.php?act=add" 
            class="btn btn-info"> เพิ่ม </a>
            <p></p>
            
            <?php
            $act = $_GET['act'];
            if($act == 'add'){
                include('type_form_add.php');
            }
            elseif($act == 'edit'){
               include('type_form_edit.php');
            }
            else{
                include("type_list.php");
            }
            ?>
        </div>
    </div>
  </div>
  </body>
</html>