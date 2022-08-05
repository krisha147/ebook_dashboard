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


$graphsql = "SELECT * FROM `graph` ORDER BY id  LIMIT 5 ";

$graphresult=$con->query($graphsql);
$graphdata=[];
if($graphresult->num_rows > 0){
    while($graphrow=$graphresult->fetch_assoc()){
        // $date = date('Y-m-d', strtotime('-7 days'));

        // if($graphrow['date'] > $date ){
        //     array_push($graphdata,$graphrow);
        // }
        // array_push($graphdata,$graphrow);


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



?>