<?php
session_start(); //start session
if (!isset($_SESSION['username'])) { //check session have or not
    header("Location: login.php"); //redirect to login.php
    exit();
}
?>


<html>
    <head>
        <title>Update Information</title>
        <?php include 'assets.html'; ?>
    </head>

<body style="background-image: url('Gate.jpg'); background-size: cover; background-position: center;">

        <?php
        include 'db.php'; 
        if (isset($_GET['id'])){            
            $id=$_GET['id'];                
            $sql="SELECT * FROM users WHERE id=$id";   
            $result=mysqli_query($conn,$sql); 
            $row=mysqli_fetch_assoc($result); 
        }
        ?>

    <div class="container mt-5">
        <div class="row justify-content-center my-5">
            <div class="col-lg-5 border rounded p-4 bg-white shadow">
                <h2 class="text-center mb-4">Update Information</h2>
                
                <form action="update.php?id=<?php echo$row['id']; ?>" method="post"> 

                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"required>  
                    <br>
                    <label class="form-label">Matric Number</label>
                    <input type="text" class="form-control" name="matric" value="<?php echo $row['matric']; ?>"required>
                    <br>
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"required> 
                    <br>
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>"required>
                    <br>
                    <label class="form-label">Programme</label>
                    <select name="programme" class="form-control" required>
                        <option value="SECPH" <?php if($row['programme']=='SECPH') echo 'selected'; ?>>Data Engineering</option>
                        <option value="SECJH" <?php if($row['programme']=='SECJH') echo 'selected'; ?>>Software Engineering</option>
                        <option value="SECBH" <?php if($row['programme']=='SECBH') echo 'selected'; ?>>Bioinformatics</option>
                        <option value="SECRH" <?php if($row['programme']=='SECRH') echo 'selected'; ?>>Network and Security</option>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST"){  
            $name=$_POST['name'];                   
            $email=$_POST['email'];                  
            $phone=$_POST['phone'];                  
            $programme=$_POST['programme'];          

            $sql="UPDATE users SET name='$name',email='$email',phone='$phone',programme='$programme' WHERE id=$id"; //update query
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Record update successfully');window.location='view.php'</script>";
            }else{
                echo "<script>alert('Failed to update');window.location='view.php'</script>";
            }
           
        }   
        ?>




    