<?php 

require 'connection.php';

if(isset($_POST['btnaddbookfdewertr'])){

$title = $_POST['title'];
$author_name= $_POST['author_name'];
$genre = $_POST['genre'];




$thumbnails = $_FILES['thumbnail']['name'];
$renamed =  substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 10);
$image = $renamed.$thumbnails;
  $validExtension = array('png','jpeg','jpg','svg');

$uploadDir = "../assets/images/".$image;
$fileExtension = pathinfo($uploadDir, PATHINFO_EXTENSION);
$fileExtension = strtolower($fileExtension);
if(in_array($fileExtension, $validExtension)){
   if(move_uploaded_file($_FILES['thumbnail']['tmp_name'],$uploadDir)){ 
        $url_image = 'http://localhost/ebook_dashboard/assets/images/'.$image ;
  }
}

$file = $_FILES['book']['name'];
$renamed_file =  substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 10);
$file_url = $renamed_file.$file;
  $validExtension = array('pdf','txt','zip');

$uploadDir = "../assets/file/".$file_url;
$fileExtension = pathinfo($uploadDir, PATHINFO_EXTENSION);
$fileExtension = strtolower($fileExtension);
if(in_array($fileExtension, $validExtension)){
   if(move_uploaded_file($_FILES['book']['tmp_name'],$uploadDir)){ 
        $url_file = 'http://localhost/ebook_dashboard/assets/file/'.$file_url ;
  }
}

$insert = "INSERT INTO `tbl_ebook`(`title`, `auth_name`, `genre`, `img`, `bookurl`) VALUES ('$title','$author_name','$genre' ,'$url_image' ,'$url_file')";
    if($con->query($insert)){
        // echo 'success';
        header('Location: ../books.php?Success');


    }
    else {
        echo 'fail';
    }

}


?>