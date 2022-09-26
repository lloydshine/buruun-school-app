<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Oten</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <style>
        .my-custom-scrollbar {
            height: 450px;
            overflow: auto;
        }
        thead {
            position: sticky;
            top: 0;
            background-color: #fff !important;
        }
    </style>
  </head>
</head>
<body>
    <div class="container my-5">
        <h1>Student Database</h1>
        <div class="col-md-7">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <a class="btn btn-primary" href="/school/create.php" role="button">New Student</a>
        <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Last Name</th>
                <th>LRN</th>
                <th>Grade Level</th>
                <th>Age</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "school";

            $connection = new mysqli($servername,$username,$password,$database);
            if($connection->connect_error) {
                die("Connection Failed: " . $connection->connect_error);
            }
            $sql = "SELECT * FROM students";
            if(isset($_GET['search'])) {
                $filtervalues = $_GET['search'];
                $sql = "SELECT * FROM students WHERE CONCAT(first_name,middle_initial,last_name,LRN,grade_lvl,address) LIKE '%$filtervalues%' ";
            }
            $result = $connection->query($sql);

            if(!$result) {
                die("Invalid Query: " . $connection->error);
            }
            if(mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["middle_initial"] . ".</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["LRN"] . "</td>
                    <td>" . $row["grade_lvl"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Update</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>";
                }
            } else {
                ?>
                    <tr>
                        <td colspan="9">No Records Found</td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>