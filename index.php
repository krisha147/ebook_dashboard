<?php require 'header.php' ?>
<link href="assets/css/vendor/britecharts.min.css" rel="stylesheet" type="text/css">
<div class="wrapper">
    <?php require 'menu.php' ?>
    <div class="content-page">
        <div class="content">
            <?php require 'topbar.php' ?>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-6" style="height:250px">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Api Chart</h4>
                                    <div dir="ltr">
                                        <div class="line-container" style="width: 100%;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h2 class="mdi mdi-monitor-dashboard"></h2>
                                            <h2 class='mx-2'>Users</h2>
                                        </div>
                                        <h4>2,578</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h2 class="mdi mdi-monitor-dashboard"></h2>
                                            <h2 class='mx-2'>Books</h2>
                                        </div>
                                        <h4>2,578</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Book</h4>
                                <table class="table mb-0">
                                <thead>
                                    <tr>
                                  
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Genre</th>
                                   
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($featuredbookdata as $key=> $value){ ?>

                                    <tr>
                                       
                                   
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['auth_name'] ?></td>
                                        <td><?php echo $value['genre'] ?></td>
                                    
                                    </tr>
                                
                               <?php }?>
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>    
        </div>
    </div>
</div>



<?php require 'footer.php' ?>



<?php require 'graphscript.php' ?>
<script src="assets/js/vendor/d3.min.js"></script>
<script src="assets/js/vendor/britecharts.min.js"></script>
