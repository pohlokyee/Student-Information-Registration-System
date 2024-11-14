<html>
<head>
<?php include 'assets.html'; ?>
<title>Register Account</title>
</head>

<body class="bg-cover d-flex flex-column justify-content-center align-items-center vh-100 bg-light"
        style="background-image: url('Gate.jpg'); background-size: cover; background-position: center;">

    <nav class="navbar fixed-top navbar-expand-md border navbar-light" style="background-color: #e3f2fd;">
        <div class="container-xxl">
            <div class="navbar-brand">
                <span class="fw-bold"><img src="UTM.png" alt="UTM logo" height="45px" width="150px" style="float:left;"></span> 
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
            </button>
            Welcome to UTM Student Management System
        </div>
    </nav> 

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-5 border rounded p-4 bg-white shadow">
                <h2 class="text-center mb-4">Register An Account</h2>
                    <form action="reg.php" method="post">
                        <label for="username" class="form-label">Username:</label><br>
                        <input type="text" class="form-control" id="username" name="username" required><br>
                        <label for="password" class="form-label">Password:</label><br>
                        <input type="password" class="form-control" id="password" name="password" required><br>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    <a href="login.php" class="btn btn-success w-100 mt-3">Areadly have an account? Login here</a>
            </div>
        </div>
    </div>
</body>
</html>

    <?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

        $sql = "INSERT INTO user_reg (username,password) VALUES ('$username','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <br>
    