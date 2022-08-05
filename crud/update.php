<?php
require "connection.php";
if(isset($_POST['updateadmin'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $update  = "UPDATE admin SET name='$name',email='$email' WHERE 1";
    if($con->query($update)){
        header('Location: ../setting.php?Updated');
    }
    else {

                          
    } 
}
else if(isset($_POST['newpw'])){
    $new = $_POST['newpw'];
    $password = $_POST['oldpws'];
    $chewckuser = "SELECT * FROM admin WHERE 1";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE admin SET password = '$changepw' WHERE 1 ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['adminpassword'] = $new;
                }else{
                    echo 'wrong';
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }
}
else if( isset($_POST['update_book_data'])){
   
    $status = $_POST['stat'];
    $id = $_POST['id'];
    $sql = "UPDATE tbl_ebook SET status='$status'WHERE id='$id'";
    if ($con->query($sql)) {
        echo "updated"; 
       //  $_SESSION['password'] = $new;
   }
   else{
    print_r($_POST);
   }
}
?>