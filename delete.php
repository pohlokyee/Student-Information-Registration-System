<?php

include "db.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM users WHERE id=$id";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Record deleted successfully');window.location='view.php'</script>";
    }else{
        echo "<script>alert('User not Deleted');window.location='view.php'</script>";
    }
}


?>