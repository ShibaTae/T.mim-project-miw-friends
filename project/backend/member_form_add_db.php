<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $m_level = 'member';
  $m_user = $_REQUEST["m_user"];
  $m_pass = $_REQUEST["m_pass"];
  $m_name = $_REQUEST["m_name"];
  $m_email = $_REQUEST["m_email"];
  $m_tel = $_REQUEST["m_tel"];
  $m_address = $_REQUEST["m_address"];

  $check = "
	SELECT  m_user 
	FROM tbl_member  
	WHERE m_user = '$m_user' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error($con));
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO tbl_member(m_level,m_user, m_pass, m_name, m_email, m_tel, m_address)
       VALUES('$m_level','$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel', '$m_address')";

  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
  
  //ปิดการเชื่อมต่อ database
  mysqli_close($con);
    }
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Register Succesfuly');";
  echo "window.location = 'member.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>