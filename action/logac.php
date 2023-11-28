<?php 
    session_start();
    include "connect.php";
    
    $name=$_POST['username'];
    $pass=$_POST['password'];
    
    $sql=mysqli_query($connect, "select * from user where username ='$name' and password= '$pass'");

    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        echo "<script> alert ('Login Successfull'); window.location.href = '../index.php'</script>";
        header("Location : ../index.php");    
        
    } else{
        header("Location: ../login.php?error=Username or password is incorrect");
        exit();
    }
?>