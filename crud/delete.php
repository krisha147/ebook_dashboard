<?php 
require "connection.php";
if(isset($_POST['delete_book_data'])){
    $id=$_POST['id'];
    //echo "dleting".$id;

    $delete  = "DELETE FROM `tbl_ebook` WHERE id= '$id'";
    if($con->query($delete)){
        echo 'deleted';
    }
    else {
                          
    }
}
?>