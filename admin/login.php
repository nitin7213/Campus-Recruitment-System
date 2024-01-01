<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Chandigarh University Campus Recruitment System</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <?php include('./header.php'); ?>
    <?php include('./db_connect.php'); ?>
    <?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
.logo {
    text-align: center;
    margin: auto;
    margin-top: 20px;
    padding: 20px;
}

div#login {
    height: 100vh;
}

.form-group {
    margin-bottom: 1rem;
    color: white;
}

.text-center {
    text-align: center !important;
    color: white;
}

.form-control {
    background: #8a888b54;
    color:white;
}
</style>

<body>




    <div id="login"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)),url('./assets/img/login-bg.jpg');">
        <br><br>
        <div class="container">

            <div class="row">

                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="container border-0 shadow rounded-3 my-5">
                        <div class="logo">
                            <img src="assets/img/cucrc.png" style="width:25vh" alt="CUCRC">
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 text-center text-white">
                                    <span>
                                        <h2><b>Log in</b></h2>
                                        <br>
                                        <h6 style="font-size:12px">Welcome to Chandigarh University <br>Campus
                                            Recruitment System
                                        </h6>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-sm-5">
                                <form id="login-form">
                                    <div class="form-group">

                                        <input type="text" id="username" name="username" class="form-control"
                                            placeholder="Username" style="border-radius:25px" required>
                                    </div>

                                    <div class="form-group">

                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password" style="border-radius:25px" required>

                                    </div>
                                    <center><button
                                            class="col-sm-12 btn btn-danger btn-wave btn-login text-uppercase fw-bold"
                                            style="border-radius:25px">Login</button>
                                    </center><br><br>
                                    <div class="text-center">Not a Staff member?
                                        <a href="../index.php" class="medium fw-bold">
                                            Return Home</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>


<script>
$('#login-form').submit(function(e) {
    e.preventDefault()
    $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
    if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
    $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err)
            $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

        },
        success: function(resp) {
            if (resp == 1) {
                location.href = 'index.php?page=home';
            } else if (resp == 2) {
                location.href = 'voting.php';
            } else {
                $('#login-form').prepend(
                    '<div class="alert alert-danger">Username or password is incorrect.</div>')
                $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
            }
        }
    })
})
</script>

</html>