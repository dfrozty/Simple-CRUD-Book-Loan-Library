<?php
include "db_conn.php";
$Member_id = $_GET['id'];
$sql = "DELETE FROM `members` WHERE Member_id = $Member_id";
$result  = mysqli_query($conn, $sql);
if($result) {
    header("Location: member2.php?msg=Data Deleted Successfully");
}
else {
    echo "Failed: " . mysqli_error($_conn);
}
?>