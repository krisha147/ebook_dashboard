<?php require 'header.php' ?>
<div class="wrapper">

<?php require 'menu.php' ?>
<div class="content-page">
                <div class="content">
<?php require 'topbar.php' ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-6 offset-md-3">
        <div class="card">
        <div class="card-body">
            <form action="controller/update.php" method="POST" >
            <h4>User info</h4>

            <div class="form-floating mb-3">
                        <input required type="text" name='name' value = "<?php echo $adminname ?>"class="form-control" id="floatingInput" placeholder="Book Title" />
                        <label for="floatingInput">Full Name </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="text" name='email' value="<?php echo $adminemail ?>" class="form-control" id="floatingemailt" placeholder="Book Title" />
                        <label for="floatingInput">Email </label>
                    </div>
                    <button type="submit" name="updateadmin" class="btn btn-rounded btn-light">Udpate</button>

</form>
                <form id="updatepassword">

                    <hr>
                    <h4>Change Password</h4>
                    <div class=" mb-3">
                        <label for="password" class="form-label">OLD Password</label>
                        <div class="input-group input-group-merge">
                            <input  type="password" name='oldpassword' class="form-control" id="oldpassword" >
                            <div class="input-group-text show-password" data-password="true">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="nw_psw"  name='new_password' class="form-control">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="con_psw"  name='confirm_password' class="form-control">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    
               <span id="pwres" ></span>
                    <br>
                    <button type="submit" class="mt-2 btn btn-rounded btn-light">Change</button>

            </form>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
</div>
</div>



<?php require 'footer.php' ?>
<script>
    $('#nw_psw').keyup(function(){
        var nw = $('#nw_psw').val();
        var cp = $('#con_psw').val();
        if(nw==cp){
            $('#pwres').html('Passsword matched'); 
            $('#pwres').addClass('text-success');
            $('#pwres').removeClass('text-danger'); 
        }
        else{
            $('#pwres').html('Passsword did not matched');
            $('#pwres').removeClass('text-success');
            $('#pwres').addClass('text-danger'); 
        }
    });

    $('#con_psw').keyup(function(){
        var nw = $('#nw_psw').val();
        var cp = $('#con_psw').val();
        if(nw==cp){
            $('#pwres').html('Passsword matched');
            $('#pwres').addClass('text-success');
            $('#pwres').removeClass('text-danger'); 
        }
        else{
            $('#pwres').html('Passsword did not matched');
            $('#pwres').removeClass('text-success');
            $('#pwres').addClass('text-danger'); 
        }
    })


    $('#updatepassword').on('submit' , function(e){
        
        e.preventDefault();
        var nw = $('#nw_psw').val();
        var cp = $('#con_psw').val();
        const oldpw = $('#oldpassword').val();
        if(oldpw !='' && nw !='' && cp !=''){
        $.ajax({
                url: "controller/update.php",
                type: "POST",
                data: {"newpw" : nw  ,'oldpws': oldpw },
                success:function(response){
                    var result = $.trim(response);
        
                    if(result == 'oldwrong'){
                        // $('#msgz').html('Old Password Wrong');
                        // $('#msgz').removeClass('text-success');
                        // $('#msgz').addClass('text-danger');
                        $('#oldpw').val('');
                        alert('Wrong Old Password ');
                    }
                    else if(result == 'sucess'){
                        // $('#msgz').html('Pin Changed');
                        alert('Changed Sucess');
                        // $('#msgz').removeClass('text-danger');
                        // $('#msgz').addClass('text-success');
                        document.getElementById("updatepassword").reset();
                    }
                    else{
                        // $('#msgz').html(response );
                        alert(response);
                    }
                }
        });
        }

    });
</script>