<?php require 'header.php' ?>
  <link rel="stylesheet" href="assets/css/star-rating-svg.css">
  <div class="wrapper">
  <?php require 'menu.php' ?>
<div class="content-page">
                <div class="content">
<?php require 'topbar.php' ?>

</div>

<section>
    <div class="card">
        <div class="card-body">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                    <th>User</th>
                    <th>Book Name</th>
                    <th>Ratings</th>
                   
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($ratingdata as $key => $ratingvalue) {?>
                    <tr >
                    <td> <?php echo $ratingvalue['user'] ?> </td>
                    <td> <?php echo $ratingvalue['book_name'] ?> </td>
                      <td> <span class='my-rating_<?php echo $ratingvalue['id']?>' ></span>  </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

<?php require 'footer.php' ?>
<script src="assets\js\jquery.star-rating-svg.js"></script>
<script src="assets\js\jquery.star-rating-svg.min.js"></script>
<script>
   <?php foreach($ratingdata as $key => $ratingvalue){ ?>
    var inirate = <?php echo  $ratingvalue["star"] ?>;
    var id = <?php echo  $ratingvalue["id"]  ?>;
        $(".my-rating_"+id).starRating({
            starSize: 20,
            initialRating: inirate,
            readOnly: true
            });
    <?php } ?>  
</script>