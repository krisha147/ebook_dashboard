<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Log In | readBook </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />

    </head>

    <body class="authentication-bg pb-0 loading">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                            <h2>readBook</h2>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                        <h6 id="process"></h6>
                        <!-- form -->
                        <form action="#" id="loginwithuser" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" autocomplete="off" type="email" id="email" required="" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                           
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
         
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    </body>

    <script>
$('#loginwithuser').on('submit', function(e) {
e.preventDefault();
const username = $('#email').val();
const password = $('#password').val();

if( username!='' && password !=''){
$.ajax({
url: "verify.php",
type: "POST",
data:{'username': username, 'password' : password},

success:function(response){
var result = $.trim(response);
    if(result == 'incorrect'){
        $('#process').html('Password Incorrect!');
            $('#password').val('');
            
        }
        else if(result == 'success'){
            // $('#messages').html('Report Saved please reload page to see changes');/
            $('#process').html('Loggin in');
            setTimeout(() => {window.location.href = "index.php";}, 1000);
        }else if(result == 'nouser'){
            $('#password').val('');
            $('#email').val('');

            $('#process').html('User not found ');

        }
            else{
            $('#process').html(response );
            }
        }
        });

    }
});

</script>

</html>