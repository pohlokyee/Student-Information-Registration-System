<?php
session_start(); //start session
if (!isset($_SESSION['username'])) { //check session have or not
    header("Location: login.php"); //redirect to login.php
    exit();
}
?>

<html>
<head>
    <title>Registered Student List</title>
    <?php include 'assets.html'; ?>
    <style>
   
    </style>
</head>

<body class="d-flex flex-column align-items-center vh-100" style="background-image: url('Gate.jpg'); background-size: cover; background-position: center;" >
    <br>
    <nav class="navbar fixed-top navbar-expand-md border navbar-light" style="background-color: #e3f2fd;">

        <div class="container-xxl">
            <div class="navbar-brand">
                <span class="fw-bold"><img src="UTM.png" alt="UTM logo" height="45px" width="150px" style="float:left;"></span> 
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="view.php" class="nav-link">Student List</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Add Student</a>
                    </li>
                    <ul class="navbar-right">
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a href="logout.php" class="btn btn-secondary">Logout</a>
                    </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
  
    <br><br><br>

    
        <div class="text-center border rounded p-2 mb-3" style="background-color: #e3f2fd;">
            <h2 >Registered Student List</h2>
        </div>
    <br>

    
    <table class="table table-hover table-bordered table-striped w-75 p-3" style="background-color: #e3f2fd;">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Matric</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Programme</th>
            <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'db.php';

        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                static $counter = 1;
                echo "<td>".$counter++."</td>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['matric']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['programme']."</td>";
                echo "<td><a href='update.php?id=".$row['id']."' style='text-decoration:none;'>Edit</a></td>";
                echo "<td><a href='delete_confirmation.php?id=".$row['id']."' style='text-decoration:none;'>Delete</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr><td colspan='8'>No Data Found</td></tr>";
        }
        ?>
        </tbody>
    </table>


        <br>
</body>
</html>