<?php
session_start();
if($_SESSION["strProductID"] == NULL){
    echo "<script> alert('โปรดเลือกสินค้า') </script>";?>
    <script> location.href = "cart_profile.php" </script>;<?php
}
include('backend/condb.php');

$m_name = $_POST['m_name'];
$m_address = $_POST['m_address'];
$m_tel = $_POST['m_tel'];
$member_id = $_POST['member_id'];

$sql = "INSERT INTO tbl_order(m_name,m_address,m_tel,total_price,Order_status,member_id)
values('$m_name','$m_address','$m_tel','" . $_SESSION["sum_price"] . "','1','$member_id')";
mysqli_query($con, $sql);

$orderID = mysqli_insert_id($con);
$_SESSION["order_id"] = $orderID;

for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if (($_SESSION["strProductID"][$i]) != "") {
        //ดึงข้อมูลสินค้า
        $sql1 = "SELECT * FROM tbl_product WHERE p_id = '" . ($_SESSION["strProductID"][$i]) . "' ";
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $price = $row1['p_cost'];
        $total = $_SESSION["strQty"][$i] * $price;

        $sql2 = "INSERT INTO tbl_order_detail(Order_id,p_id,p_cost,orderQty,Total)
    values('$orderID','" . $_SESSION["strProductID"][$i] . "','$price','" . $_SESSION["strQty"][$i] . "','$total')";
        if (mysqli_query($con, $sql2)) {
            $sql3 = "UPDATE tbl_product SET p_amount = p_amount - '" . $_SESSION["strProductID"][$i] . "' 
    WHERE p_id = '" . $_SESSION["strProductID"][$i] . "'";
            mysqli_query($con, $sql3);
            echo "<script> alert('บันทึกข้อมูลเรียบร้อย') </script>";
            echo "<script> window.location = 'invoice.php'</script>";
        }
    }
}
mysqli_close($con);



