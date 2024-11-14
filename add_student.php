<html>
<head>
    <title>Register Form</title>
    <?php include 'assets.html'; ?>
</head>

<body class="d-flex flex-column align-items-center vh-100" style="background-image: url('Gate.jpg'); background-size: cover; background-position: center;height:100%;margin:0">
        <!-- <img src="UTM.png" alt="UTM logo" height="83px" width="250px" style="float:left;"> -->
        <nav class="navbar fixed-top navbar-expand-md border navbar-light" style="background-color: #e3f2fd;">
            <div class="container-xxl">
                <div class="navbar-brand">
                    <span class="fw-bold"><img src="UTM.png" alt="UTM logo" height="45px" width="150px" style="float:left;"></span> 
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav">
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

    <br>

    <div class="container ">
        <div class="row justify-content-center my-5 p-3">
            <div class="col-lg-5 col-md-10 col-sm-10 col-11 border rounded p-4 bg-white">
                <h2 class="text-center mb-4">Registration Form</h2>
                
                    <form action="register.php" method="POST">

                            <label for="name" class="form-label">Name *</label><br>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required>
                            <br>

                            <label for="matric" class="form-label">Matric Number *</label><br>
                            <input type="text" class="form-control" id="matric" name="matric" placeholder="AxxCSxxxx" required>
                            <br>

                            <label for="email" class="form-label">UTM Email *</label><br>
                            <input type="email" class="form-control" id="email" name="email" placeholder="mail@graduate.utm.my" required>
                            <br>

                            <label for="phone" class="form-label">Phone *</label><br>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="0123456789" required>
                            <br>

                            <label for="programme" class="form-label">Programme</label><br>
                            <select class="form-control" id="programme" name="programme">
                                <option value="SECPH">Data Engineering</option>
                                <option value="SECJH">Software Engineering</option>
                                <option value="SECBH">Bioinformatics</option>
                                <option value="SECRH">Network and Security</option>
                            </select>
                            <br>
                    
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>

    <?php

    include 'db.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $matric = $_POST['matric'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $programme = $_POST['programme'];


            $sql = "INSERT INTO users (name, matric, email, phone, programme) VALUES ('$name', '$matric', '$email', '$phone', '$programme')";
            

            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Register successfully');</script>";
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>
