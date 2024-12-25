<?php
include "db_conn.php";
$Book_id = $_GET['id'];
$sql = "DELETE FROM `books` WHERE Book_id = $Book_id";
$result  = mysqli_query($conn, $sql);
if($result) {
    header("Location: book2.php?msg=Data Deleted Successfully");
}
else {
    echo "Failed: " . mysqli_error($_conn);
}
?>