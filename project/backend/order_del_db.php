<?php
include('condb.php');
$ids = $_GET["id"];
$sql1 = "UPDATE tbl_order SET Order_status = 0 WHERE Order_id = '$ids' ";
$result = mysqli_query($con, $sql1);

    if($result){
        echo "<script>";
        echo "alert('Cancel Successfuly');";
        echo "window.location = 'order.php';";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Error back to cancel again');";
        echo "</script>";
    }

mysqli_close($con);
?>