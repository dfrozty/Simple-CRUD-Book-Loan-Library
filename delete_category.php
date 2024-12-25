<?php
include "db_conn.php";
$Category_id = $_GET['id'];
$sql = "DELETE FROM `categories` WHERE Category_id = $Category_id";
$result  = mysqli_query($conn, $sql);
if($result) {
    header("Location: member2.php?msg=Data Deleted Successfully");
}
else {
    echo "Failed: " . mysqli_error($_conn);
}
?>