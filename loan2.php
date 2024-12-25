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
        <div class="container" style="padding-top: 120px;">
            <?php
            if(isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            ?>
            <a href="loan.php" class="btn btn-dark mb-3">Loan Book</a>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Loan ID</th>
                    <th scope="col">Book ID</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Loan Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        include "db_conn.php";

                            $sql = "SELECT * FROM `loans`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['Loan_id']?></td>
                                    <td><?php echo $row['Book_id']?></td>
                                    <td><?php echo $row['Member_id']?></td>
                                    <td><?php echo $row['Loan_date']?></td>
                                    <td><?php echo $row['Return_date']?></td>
                                    <td>
                                        <a href="edit_loan.php?id=<?php echo $row['Loan_id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-8 text-dark text-center"></i></a>
                                        <a href="delete_loan.php?id=<?php echo $row['Loan_id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-8 text-dark text-center"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>