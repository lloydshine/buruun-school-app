<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "school";

$connection = new mysqli($servername,$username,$password,$database);

$firstname = "";
$middle = "";
$lastname = "";
$lrn = "";
$gradelvl = "";
$age = "";
$address = ""; 
$errorMessage = "";
$successMessage = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST["firstname"];
    $middle = $_POST["middle"];
    $lastname = $_POST["lastname"];
    $lrn = $_POST["lrn"];
    $gradelvl = $_POST["gradelvl"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    do {
        if(empty($firstname)||empty($middle)||empty($lastname)||empty($lrn)||empty($gradelvl)||empty($age)||empty($address)) {
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
        if(!is_numeric($age)) {
            $errorMessage = "Invalid Age!";
            break;
        }
        if(!is_numeric($gradelvl)) {
            $errorMessage = "Invalid Grade Level!";
            break;
        }
        if($gradelvl > 12 || $gradelvl < 1) {
            $errorMessage = "Grade Level must be 1 - 12!";
            break;
        }

        $sql = "INSERT INTO students(first_name,middle_initial,last_name,LRN,grade_lvl,age,address) " .
               "VALUES ('$firstname','$middle','$lastname','$lrn',$gradelvl,$age,'$address')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $firstname = "";
        $middle = "";
        $lastname = "";
        $lrn = "";
        $gradelvl = "";
        $age = "";
        $address = ""; 
        $successMessage = "Student Added to the database!";
        break;
    } while (false);
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
    <div class="container my-5">
        <h1>New Student</h1>

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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="First Name" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Middle Initial</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Middle Initial" class="form-control" name="middle" value="<?php echo $middle; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Last Name" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">LRN</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Student LRN" class="form-control" name="lrn" value="<?php echo $lrn; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Grade Level</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Student Grade Level" class="form-control" name="gradelvl" value="<?php echo $gradelvl; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Age" class="form-control" name="age" value="<?php echo $age; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Address" class="form-control" name="address" value="<?php echo $address; ?>">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/school/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>