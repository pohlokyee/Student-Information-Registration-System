<html>
<head>
<?php include 'assets.html'; ?>
<title>Login Page</title>

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
                <h2 class="text-center mb-4">Login Account</h2>
                    <form action="login.php" method="post">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <br>
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="col-auto my-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                    <label class="form-check-label" for="autoSizingCheck2">
                                    Remember me
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                <a href="reg.php" class="btn btn-success w-100 mt-3">Don't have an account? Register here</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start(); //start session

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);   //get username
    $password = $_POST['password']; //get password

    $sql = "SELECT * FROM user_reg WHERE username='$username'";//select all data from user_reg table where username=$username
    $result = mysqli_query($conn, $sql);//execute query

    if (mysqli_num_rows($result) == 1) {//check data have or not
        $row = mysqli_fetch_assoc($result);//fetch data
        if (password_verify($password, $row['password'])) {//$password(from form) is equal to $row['password'](from database)
            $_SESSION['username'] = $username;//set session
            header("Location: view.php");//redirect to view.php
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "No user found";
    }
}
?>