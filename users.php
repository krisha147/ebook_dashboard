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
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            
            <th>Name</th>
            <th>Email</th>
           
        </tr>
    </thead>


    <tbody>
<?php
foreach($userdata as $key=>$uservalue){


?>
    <tr> 
            <td><?php echo $uservalue['name']?></td>
            <td><?php echo $uservalue['email']?></td>
            
            
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


<?php require 'footer.php' ?>


<script>
    


  
</script>