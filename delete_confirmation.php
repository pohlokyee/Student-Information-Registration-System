<?php
session_start(); //start session
if (!isset($_SESSION['username'])) { //check session have or not
    header("Location: login.php"); //redirect to login.php
    exit();
}

$id = $_GET['id'];
?>


<head>
    <title>Delete Confirmation</title>
    <?php include 'assets.html'; ?>
</head>

<body class="d-flex flex-column align-items-center vh-100" style="background-image: url('Gate.jpg'); background-size: cover; background-position: center;">

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

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4">
            <h3 class="text-center">Are you sure you want to delete this record?</h3>
            <div class="d-flex justify-content-around mt-4">
                <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
                <a href="view.php" class="btn btn-secondary">No</a>
            </div>
        </div>
    </div>

</body>
</html>