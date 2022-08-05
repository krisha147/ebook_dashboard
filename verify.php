<?php 
    require 'crud/connection.php';

    if(isset($_POST['username']) && isset($_POST['password'])){
        $email = $_POST['username'];
        $password = $_POST['password'];
        require 'crud/connection.php';
        
        $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            session_start();
            $_SESSION['adminusername'] = $fetch['email'];
            $_SESSION['adminpassword'] = $password;

            echo 'success';
        }else{
            session_start();
            session_unset();
            session_destroy();
            echo 'incorrect';
        }
        }else{
            session_start();
            session_unset();
            session_destroy();
            echo 'nouser';
        }
        
        }
        

?>