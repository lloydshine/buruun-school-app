<?php
$id = "OTEN";
$firstname = "Cum";
$middle = "Pussy";
$lastname = "Bitch";
$lrn = 6969"";
$gradelvl = "Level 69";
$age = "90";
$address = "Iligan City";

$errorMessage = "";
$successMessage = "";
$id = $_POST['id'];
$firstname = $_POST["firstname"];
$middle = $_POST["middle"];
$lastname = $_POST["lastname"];
$lrn = $_POST["lrn"];
$gradelvl = $_POST["gradelvl"];
$age = $_POST["age"];
$address = $_POST["address"];
    do {
        if(empty($id)||empty($firstname)||empty($middle)||empty($lastname)||empty($lrn)||empty($gradelvl)||empty($age)||empty($address)) {
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
        $successMessage = "Successfully Edited Data";
        break;
    } while(false);
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
                <label class="col-sm-3 col-form-label">Grade Level</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gradelvl" value="<?php echo $gradelvl; ?>">
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
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
