<meta charset="utf-8">
<?php
include('condb.php');
	$member_id  = $_POST["member_id"];
	$m_pass1  = $_POST["m_pass1"];
	$m_pass2  = $_POST["m_pass2"];

	if($a_pass1 != $a_pass2){
		echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
		echo "window.location = 'member.php'; ";
		echo "</script>";
	}else{
	$sql = "UPDATE tbl_member SET 
	m_pass ='$m_pass1'
	WHERE m_id=$m_id
	 ";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
	}
	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password สำเร็จ');";
	echo "window.location = 'admin.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'admin.php'; ";
	echo "</script>";
}
?>