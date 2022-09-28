<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Oten</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <style>
        #main {
            display: flex;
            align-items: center; /* Vertical align the elements to the center */
        }
        h1 {
            margin-right: 20px;
        }
        .my-custom-scrollbar {
            height: 400px;
            overflow: auto;
        }
        .table,
        tr,
        td {
            background-color: white !important;
        }
        thead {
            padding: 0;
            margin: 0;
            position: sticky;
            top: 0;
            background-color: #fff !important;
        }
    </style>
  </head>
</head>
<body>
    <div class="container my-5">
        <div id="main">
        <h1>Student Database</h1><a class="btn btn-outline-danger" href="index.php" role="button">Logout</a>
        </div>
        <div class="col-md-7">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="create.php" role="button">New Student</a>
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
           <tr>
             <td>1</td>
             <td>Perez</td>
             <td>Very</td>
             <td>Gae</td>
             <td>123456789012</td>
             <td>1</td>
             <td>12</td>
             <td>Suarez</td>
             <td>
                 <a class='btn btn-primary btn-sm' href='edit.php'>Update</a>
                 <a class='btn btn-danger btn-sm'>Delete</a>
             </td>
           </tr>
            <tr>
             <td>2</td>
             <td>Nathan</td>
             <td>Very</td>
             <td>Smol</td>
             <td>123456789012</td>
             <td>1</td>
             <td>12</td>
             <td>Iligan</td>
             <td>
                 <a class='btn btn-primary btn-sm' href='edit.php'>Update</a>
                 <a class='btn btn-danger btn-sm'>Delete</a>
             </td>
           </tr>
            <tr>
             <td>3</td>
             <td>Dexter</td>
             <td>Very</td>
             <td>Large</td>
             <td>123456789012</td>
             <td>1</td>
             <td>12</td>
             <td>Saray</td>
             <td>
                 <a class='btn btn-primary btn-sm' href='edit.php'>Update</a>
                 <a class='btn btn-danger btn-sm'>Delete</a>
             </td>
           </tr>
            <tr>
             <td>4</td>
             <td>LadyMae</td>
             <td>Very</td>
             <td>Very Very Smol Midget</td>
             <td>123456789012</td>
             <td>1</td>
             <td>12</td>
             <td>Mars Alien</td>
             <td>
                 <a class='btn btn-primary btn-sm' href='edit.php'>Update</a>
                 <a class='btn btn-danger btn-sm'>Delete</a>
             </td>
           </tr>
            <tr>
             <td>5</td>
             <td>Andro</td>
             <td>Very</td>
             <td>Oten</td>
             <td>123456789012</td>
             <td>1</td>
             <td>2</td>
             <td>Cum</td>
             <td>
                 <a class='btn btn-primary btn-sm' href='edit.php'>Update</a>
                 <a class='btn btn-danger btn-sm'>Delete</a>
             </td>
           </tr>
        </tbody>
    </table>
        <image src="https://scontent.fdvo2-2.fna.fbcdn.net/v/t1.6435-9/156884185_2915599905430110_8683508041492212648_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lcbd2a2iW4YAX_KV4bM&_nc_ht=scontent.fdvo2-2.fna&oh=00_AT9HO2KQPRYjS5wh77PlCKK01wqKd-awWA47yYW-dxrIJg&oe=6358AB95" style="width:100%;height:500px;top:0;">
    </div>
    </div>
</body>
</html>
