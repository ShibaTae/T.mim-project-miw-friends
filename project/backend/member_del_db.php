<meta charset = "UFT-8"/>
<?php
include('condb.php');
$member_id = $_REQUEST["ID"];
$sql = "DELETE FROM tbl_member WHERE member_id = '$member_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con))
;
 mysqli_close($con);
    if($result){
        echo "<script>";
        echo "alert('Delete Successfuly');";
        echo "window.location = 'member.php';";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Error back to delete again');";
        echo "</script>";
    }
?>