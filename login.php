<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/login_process.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once "./partials/Head.php";?>

<body>

<!-- Navigation -->
<?php include_once "./partials/Navigation.php";?>

<section class="login-page-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 offset-md-3 col-sm-12 col-md-6">
                <div class="login-form">
                    <div class="form-group text-center">
                        <h2>Welcome Back</h2>
                        <h4>Please Log In</h4>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                        <div class="form-group form-check">
                            <input required name="user_role" value="user" type="radio" class="form-check-input" id="user_role">
                            <label class="form-check-label" for="exampleCheck1">User Login</label>
                            <br>
                            <input required name="user_role" value="consultant" type="radio" class="form-check-input" id="user_role">
                            <label class="form-check-label" for="exampleCheck1">Consultant Login</label>
                        </div>
                        <input type="hidden" name="role" value="admin">
                        <div class="form-group text-center">
                            <h5 class="text-danger"><?php echo $msg; ?></h5>
                        </div>
                        <div class="form-group text-center">
                            <button name="submit" value="submit" type="submit" class="btn bg-dark text-white">Submit</button>
                        </div>
                        <div class="form-group text-center">
                            <p>Dont' have a Account? <a href="register.php">REGISTER</a> Now</p>
                            <small><a href="">Forgot Password?</small></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once "./partials/Footer.php"?>

<!-- =============   SCRIPTS   ============ -->

<?php include_once "./partials/ScriptTags.php" ?>

</body>
</html>