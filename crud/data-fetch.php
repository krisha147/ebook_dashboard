<?php
require 'connection.php';

$booksql = "SELECT * FROM `tbl_ebook` ";

$bookresult=$con->query($booksql);
$bookdata=[];
if($bookresult->num_rows > 0){
    while($bookrow=$bookresult->fetch_assoc()){
        array_push($bookdata,$bookrow);
    }
}


$usersql = "SELECT * FROM `usertable` ";

$userresult=$con->query($usersql);
$userdata=[];
if($userresult->num_rows > 0){
    while($userrow=$userresult->fetch_assoc()){
        array_push($userdata,$userrow);
    }
}

$ratingsql = "SELECT * FROM `rating` ";
// echo $ratingsql;
$ratingresult=$con->query($ratingsql);
$ratingdata=[];
if($ratingresult->num_rows > 0){
    while($ratingrow=$ratingresult->fetch_assoc()){
        array_push($ratingdata,$ratingrow);
    }
}




$featuredbooksql = "SELECT * FROM `tbl_ebook` WHERE status='featured' LIMIT 5";
$featuredbookres=$con->query($featuredbooksql);
$featuredbookdata=[];
if($featuredbookres->num_rows>0){
    while($featuredbookrow=$featuredbookres->fetch_assoc()){
array_push($featuredbookdata,$featuredbookrow);
    }
}


$adminsql = "SELECT * FROM `admin` ";

$adminresult=$con->query($adminsql);
if($adminresult->num_rows > 0){
    while($adminrow=$adminresult->fetch_assoc()){
        // array_push($admindata,$adminrow);
        $adminname = $adminrow['name'];
        $adminemail = $adminrow['email'];

    }
}


$tbl_ebook_sql = "SELECT COUNT(id) FROM tbl_ebook ";
$tbl_ebook_result = mysqli_query($con,$tbl_ebook_sql);
$tbl_ebook_row = mysqli_fetch_array($tbl_ebook_result);
$tbl_ebook_count = $tbl_ebook_row[0];

$rating_sql = "SELECT COUNT(id) FROM rating ";
$rating_result = mysqli_query($con,$rating_sql);
$rating_row = mysqli_fetch_array($rating_result);
$rating_count = $rating_row[0];

$featured_ebook_sql = "SELECT COUNT(id) FROM tbl_ebook  WHERE status = 'featured'";
$featured_ebook_result = mysqli_query($con,$featured_ebook_sql);
$featured_ebook_row = mysqli_fetch_array($featured_ebook_result);
$featured_ebook_count = $featured_ebook_row[0];

$usertable_sql = "SELECT COUNT(id) FROM usertable ";
$usertable_result = mysqli_query($con,$usertable_sql);
$usertable_row = mysqli_fetch_array($usertable_result);
$usertable_count = $usertable_row[0];

?>