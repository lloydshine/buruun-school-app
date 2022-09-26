<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "school";

$connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

$id = "";
$firstname = "";
$middle = "";
$lastname = "";
$lrn = "";
$age = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }
    
    $id = $_GET["id"];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) {
        header("location: index.php");
        exit;
    }

    $firstname = $row['first_name'];
    $middle = $row['middle_initial'];
    $lastname = $row['last_name'];
    $lrn = $row['LRN'];
    $age = $row['age'];
    $address = $row['address'];
} else {
    $id = $_POST['id'];
    $firstname = $_POST["firstname"];
    $middle = $_POST["middle"];
    $lastname = $_POST["lastname"];
    $lrn = $_POST["lrn"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    do {
        if(empty($id)||empty($firstname)||empty($middle)||empty($lastname)||empty($lrn)||empty($age)||empty($address)) {
            $errorMessage = "All the fields are required!";
            break;
        }
        if(strlen($middle) > 1) {
            $errorMessage = "Invalid Middle Initial";
            break;
        }
        if(strlen($lrn) != 12) {
            $errorMessage = "LRN must be 12 numbers!";
            break;
        }
        if(!is_numeric($lrn)) {
            $errorMessage = "Invalid LRN!";
            break;
        }
        if(strlen($age) > 2) {
            $errorMessage = "Invalid Age";
            break;
        }
        if(!is_numeric($age)) {
            $errorMessage = "Invalid Age!";
            break;
        }
        $sql = "UPDATE students " .
               "SET first_name='$firstname',middle_initial='$middle',last_name='$lastname',LRN='$lrn',age='$age',address='$address' " .
               "WHERE id = $id";
        $result = $connection->query($sql);
        if(!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }
        $successMessage = "Successfully Edited Data";
        break;
    } while(false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Middle Initial</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="middle" value="<?php echo $middle; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">LRN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lrn" value="<?php echo $lrn; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/school/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>