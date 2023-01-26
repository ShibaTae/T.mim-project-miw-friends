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
        <form name="register" action="account_db.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="input-field">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> ชื่อผู้ใช้งาน </p1>
                            </div>
                            <input name="m_user" placeholder="Username" type="text" required id="m_user" value="<?= $m_user; ?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> รหัสผ่าน </p1>
                            </div>
                            <input name="m_pass" placeholder="Password" type="password" required id="m_pass" value="<?= $m_pass; ?>" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> ชื่อ-นามสกุล </p1>
                            </div>
                            <input name="m_name" placeholder="ชื่อ-นามสกุล" type="text" required id="m_name" value="<?= $m_name; ?>" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> Email </p1>
                            </div>
                            <input name="m_email" placeholder="Email" type="text" required id="m_email" value="<?= $m_email; ?>" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> เบอร์โทรศัพท์ </p1>
                            </div>
                            <input name="m_tel" placeholder="Telephone Number" type="text" required id="m_tel" value="<?= $m_tel; ?>" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p1> ที่อยู่ </p1>
                            </div>
                            <input name="m_address" placeholder="Address" type="text" required id="m_address" value="<?= $m_address; ?>" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9" align="right">
                                <button type="submit" class="btn btn-success ">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </main>
</body>