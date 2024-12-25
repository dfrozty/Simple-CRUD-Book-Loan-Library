<?php
include "db_conn.php";
$Loan_id = $_GET['id'];
$sql = "DELETE FROM `loans` WHERE Loan_id = $Loan_id";
$result  = mysqli_query($conn, $sql);
if($result) {
    header("Location: loan2.php?msg=Data Deleted Successfully");
}
else {
    echo "Failed: " . mysqli_error($_conn);
}
?>