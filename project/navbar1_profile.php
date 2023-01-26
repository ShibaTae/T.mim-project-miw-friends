<?php include('h.php'); 
include('backend/condb.php'); //เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
?>

<div class="topNav">
    <a href="index_pro.php">
        <img src="Project_Sala/image/logo_v2.png" style="width: 200px;">
    </a>
    <a href="logout.php" class="pro" onclick="confirm('คุณต้องการออกจากระบบหรือไม่?')">
        ออกจากระบบ
    </a>
    <a href="account.php" class="pro">
        <img src="Project_Sala/image/account.png" style="width: 30px;">
    </a>
</div>