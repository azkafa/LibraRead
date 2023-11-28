<?php 
    include "connect.php";
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $confirmpw=$_POST['confirmpassword'];
    
    if ($pass == $confirmpw) {
        $sql=mysqli_query($connect, "insert into user values('','$user','$email','$pass')");

        echo "<script> alert('Account has been created'); window.location.href='../login.php';</script>";
    } else{
        header("Location: ../signup.php?error=Password and confirm password are different");
        exit();
    }
    
?>