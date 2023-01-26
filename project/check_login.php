<?php
session_start();
if (isset($_POST['m_user'])) {
    //connection
    include("backend/condb.php");
    //รับค่า user & password
    $m_user = mysqli_real_escape_string($con, $_POST['m_user']);
    $m_pass = mysqli_real_escape_string($con, $_POST['m_pass']);

    $sql = "SELECT * FROM tbl_member
                              WHERE m_user='" . $m_user . "' 
                              AND m_pass='" . $m_pass . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION["user_id"] = $row["member_id"];
        $_SESSION["m_level"] = $row["m_level"];
        $_SESSION["m_name"] = $row["m_name"];
        //check role ว่าเป็น admin หรือ member
        if ($row['m_level'] == "admin") {

            Header("Location: backend/member.php");
        } elseif ($row['m_level'] == "member") {

            Header("Location: index_pro.php");
        }
    //user กับ password ไม่ถูกจะกลับไปหน้า login อีกรอบ
    } else {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }

} else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
    Header("Location: backend/index.php");

}
