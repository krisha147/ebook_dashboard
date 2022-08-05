<?php
session_start();

if(isset($_SESSION["adminusername"]) & isset($_SESSION["adminpassword"])){
    $email = $_SESSION['adminusername'];
    $password = $_SESSION['adminpassword'];
    require 'crud/connection.php';
    
    $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
    $res = mysqli_query($con, $chewckuser);
    if(mysqli_num_rows($res) > 0){
    $fetch = mysqli_fetch_assoc($res);
    $fetch_pass = $fetch['password'];
    if(password_verify($password, $fetch_pass)){
        $adminname = $fetch['name'];

    }
    
}

}else{
    header('Location: login.php');
exit;
}

?>