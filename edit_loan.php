<?php
include "db_conn.php";
$Loan_id = $_GET['id'];

if(isset($_POST['submit'])) {
    $Loan_id     = $_POST['Loan_id'];
    $Book_id     = $_POST['Book_id'];
    $Member_id   = $_POST['Member_id'];
    $Loan_date   = $_POST['Loan_date'];
    $Return_date = $_POST['Return_date'];

    $sql = "UPDATE `loans` SET `Book_id` = '$Book_id', `Member_id` = '$Member_id', `Loan_date` = '$Loan_date', `Return_date` = '$Return_date' WHERE `Loan_id` = '$Loan_id'";

    $result         = mysqli_query($conn, $sql);

    if($result) {
        header("Location: loan2.php?msg=Data Updated Successfully");
    }
    else {
        echo "Failed: " . mysqli_error($_conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpusku</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background: url(assets/img/library2.jpg)">
    <!--Navigation-->
    <nav>
        <input type="checkbox" name="" id="chk1">
        <div class="logo"><h1>Perpusku</h1></div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="category.php">Categories</a></li>
            <li><a href="book.php">Book</a></li>
            <li><a href="loan.php">Loan</a></li>
            <li><a href="member.php">Member </a></li>
            <li>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
        </ul>
        <div class="menu">
            <label for="chk1">
                <i class="fa fa-bars"></i>
            </label>
        </div>
    </nav>

    <!--Container-->
    <div class="container" style="width:50vw; min-width:300px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #ffff; padding-top: 88px;">
        <div class="text-center mb-4">
            <h3 style="padding-top: 20px; font-family:Arial, Helvetica, sans-serif; font-weight: 300;">Edit Information</h3>
        </div>

        <?php
        $sql     = "SELECT * FROM `loans` WHERE Loan_id = $Loan_id";
        $result  = mysqli_query($conn, $sql);
        $row     = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post">
                <div class="row">
                    <div>
                        <label class="form-label" style="height: 2px;">Loan ID</label>
                        <input type="number" class="form-control" name="Loan_id"
                        value="<?php echo $row['Loan_id'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Book ID</label>
                        <input type="text" class="form-control" name="Book_id"
                        value="<?php echo $row['Book_id'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Member ID</label>
                        <input type="text" class="form-control" name="Member_id"
                        value="<?php echo $row['Member_id'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Loan Date</label>
                        <input type="text" class="form-control" name="Loan_date"
                        value="<?php echo $row['Loan_date'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Return Date</label>
                        <input type="text" class="form-control" name="Return_date"
                        value="<?php echo $row['Return_date'] ?>">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>