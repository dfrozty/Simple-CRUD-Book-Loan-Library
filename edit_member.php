<?php
include "db_conn.php";
$Member_id = $_GET['id'];

if(isset($_POST['submit'])) {
    $Member_id     = $_POST['Member_id'];
    $Name          = $_POST['Name'];
    $Email         = $_POST['Email'];
    $Phone         = $_POST['Phone'];

    $sql = "UPDATE `members` SET `Name` = '$Name', `Email` = '$Email', `Phone` = '$Phone' WHERE `Member_id` = '$Member_id'";

    $result         = mysqli_query($conn, $sql);

    if($result) {
        header("Location: member2.php?msg=Data Updated Successfully");
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
            <li><a href="member">Member </a></li>
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
        $sql     = "SELECT * FROM `members` WHERE Member_id = $Member_id";
        $result  = mysqli_query($conn, $sql);
        $row     = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post">
                <div class="row">
                    <div>
                        <label class="form-label" style="height: 2px;">ID</label>
                        <input type="number" class="form-control" name="Member_id"
                        value="<?php echo $row['Member_id'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Name</label>
                        <input type="text" class="form-control" name="Name"
                        value="<?php echo $row['Name'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Email</label>
                        <input type="text" class="form-control" name="Email"
                        value="<?php echo $row['Email'] ?>">
                    </div>

                    <div>
                        <label class="form-label" style="height: 2px;">Phone</label>
                        <input type="text" class="form-control" name="Phone"
                        value="<?php echo $row['Phone'] ?>">
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