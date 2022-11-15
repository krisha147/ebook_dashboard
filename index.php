<?php require 'header.php' ?>
<link href="assets/css/vendor/britecharts.min.css" rel="stylesheet" type="text/css">
<div class="wrapper">
    <?php require 'menu.php' ?>
    <div class="content-page">
        <div class="content">
            <?php require 'topbar.php' ?>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="mdi mdi-account"></h4>
                                    <h4 class='mx-2'>Users</h4>
                                </div>
                                <h4><?php echo $usertable_count ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="mdi mdi-book"></h4>
                                    <h4 class='mx-2'>Total Books</h4>
                                </div>
                                <h4><?php echo $tbl_ebook_count ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="mdi mdi-book-arrow-up"></h4>
                                    <h4 class='mx-2'>Featured Books</h4>
                                </div>
                                <h4><?php echo $featured_ebook_count ?></h4>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="mdi mdi-star"></h4>
                                    <h3 class='mx-2'>Ratings</h4>
                                </div>
                                <h4><?php echo $rating_count ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4> Featured Book</h4>
                        <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Book Name</th>
                                <th scope="col">Author</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($featuredbookdata as $key=> $value){ ?>
                            <tr>
                                <td><?php echo $value['title'] ?></td>
                                <td><?php echo $value['auth_name'] ?></td>
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



<?php require 'footer.php' ?>



<?php require 'graphscript.php' ?>
<script src="assets/js/vendor/d3.min.js"></script>
<script src="assets/js/vendor/britecharts.min.js"></script>
