<?php require 'header.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
   
<div class="wrapper">

<?php require 'menu.php' ?>
<div class="content-page">
                <div class="content">
<?php require 'topbar.php' ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-info mb-3 " data-bs-toggle="modal" data-bs-target="#centermodal">ADD BOOK</button>
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Image</th>
            <th>Action</th>
           
        </tr>
    </thead>


    <tbody>
<?php
foreach($bookdata as $key=>$bookvalue){

$gen=$bookvalue['genre'];
$genr=str_replace('--','<br>',$gen);

$genre = str_replace(',','<br>',$genr);

$t = $bookvalue['title'];

$nameSplits = explode(' ', $t);
$pos = 1;


?>
    <tr id="tr_book_<?php echo $bookvalue['id'] ?>"> 
            <td><?php foreach ($nameSplits as $_part) {
   echo $_part .' ';
   if ($pos == 3) {
      echo '<br />';
      $pos = 1;
   } else {
      $pos++;
   }

   $stat = ['active','deactive','featured'];
}?></td>
            <td><?php echo $bookvalue['auth_name']?></td>
            <td><?php echo $genre?></td>
            <td><img src="<?php echo $bookvalue['img']?>" style="width:50px"></td>
            <td>
                <select id='bookstatus_<?php echo $bookvalue['id'] ?>' onchange="changestatus(<?php echo $bookvalue['id'] ?>)" >
                   
                 <?php foreach ($stat as $status) { ?> 
                    <option value='<?php echo $status ?>' <?php if($status==$bookvalue['status']) { echo 'selected'; }  ?> ><?php echo ucfirst($status) ?></option> <?php } ?>

            </select>
            <a href="javascript:delete_book(<?php echo $bookvalue['id'] ?>)" class="mdi mdi-trash-can text-danger h2"></a></td>
            
        </tr>
<?php } ?> 
    </tbody>
</table>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form action="controller/add.php " enctype="multipart/form-data" method='POST'  class="needs-validation" novalidate>
                    <div class="form-floating mb-3">
                        <input required type="text" name='title' class="form-control" id="floatingInput" placeholder="Book Title" />
                        <label for="floatingInput">Book Title </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="text" name='author_name' class="form-control" id="floatingInput" placeholder="Author Name" />
                        <label for="floatingInput">Author Name</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Genre</label>
                        <input required type="text" name='genre' class="form-control"  id='tags' >
                    </div>
                    <div class="row mb-3" >
                        <div class="col-6 ">  
                            <label for="example-fileinput"  class="form-label">Thumbnail </label>
                            <input required type="file" name='thumbnail' id="example-fileinput" class="form-control">
                        </div>
                        <div class="col-6"><label for="example-fileinput" class="form-label">Book</label>
                        <input required type="file" name='book' id="example-fileinput" class="form-control"></div>
                    </div>
                    <button type="submit" name="btnaddbookfdewertr" class="btn btn-success btn-rounded">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="assets\js\tokenfield.js"></script>

<script>
    
$(document).ready(function(){
 $('#tags').tokenfield({
  autocomplete:{
   source: [],
   delay:100
  },
  showAutocompleteOnFocus: true
 });
 
});

    function delete_book(id){
       if( confirm("Are you sure you want to delete permanently???")==true){
           $.ajax({
               url:"controller/delete.php",
               method:'POST',
               data:{
                   'id':id,
                   'delete_book_data':'true',
               },
               success:function(data){
                   var result = $.trim(data);
                   if(result=='deleted'){
        document.getElementById('tr_book_'+id).style.display="none";


                   }
                   else{
                       alert(data);
                   }
               }


           })


       }
       
    }

    function changestatus(id){
        // alert(id);
       var stat = $('#bookstatus_'+id).val();
//  alert(id+' = '+stat);

$.ajax({
               url:"controller/update.php",
               method:'POST',
               data:{
                   'id':id,
                   'stat':stat,
                   'update_book_data':'true',
               },
               success:function(data){
                   var result = $.trim(data);
                   if(result=='updated'){
                    alert("done");


                   }
                   else{
                       alert(data);
                   }
               }


           })

    }
</script>