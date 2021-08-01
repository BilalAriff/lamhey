<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/register_process.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <title>Home - Lamhey</title>
</head>
<body>

<!-- Navigation -->

<section class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand text-white" href="index.php">Logo</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>


<section class="login-page-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 offset-md-3 col-sm-12 col-md-6">
                <div class="login-form">
                    <div class="form-group text-center">

                        <h2>Welcome</h2>
                        <h4><?php echo $Msg ?></h4>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="uername">Username</label>
                            <input name="username" id="reg_username" type="text" class="form-control" placeholder="Username123">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="reg_email" type="email" class="form-control" placeholder="jhondoe@gmail.com">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input class="form-control" name="firstname" id="reg_firstname" placeholder="Jhon" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input name ="lastname" id="reg_firstname" type="text" class="form-control" placeholder="Doe">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name ="password" id="reg_Password" type="password" class="form-control" placeholder="***********">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confrim Password</label>
                            <input name ="confirm_password" id="reg_confirm_Password" type="password" class="form-control" placeholder="***********">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" id="reg_address" type="text" class="form-control" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <input name="city" id="reg_city" type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select name="state" id="inputState" class="form-control">
                                <option selected>Sindh</option>
                                <option>Balochistan</option>
                                <option>Punjab</option>
                                <option>Azad Kashmir</option>
                                <option>Sindh</option>
                            </select>
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputZip">Zip</label>
                            <input name="zip" type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" value="consultant" type="radio" name="role" id="flexRadioDefault1">
                                <label class="form-check-label" for="">
                                    Consultant Profile
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="user" type="radio" name="role" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="user">
                                    User Profile
                                </label>
                            </div>
                        </div>
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Register</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<section class="main-footer-section">
    <footer class="main-footer text-center bg-dark">
        <h4>Book Online Event Managment Consultant</h4>
        <h5><strong>Bilal Arif</strong> - FYP</h5>
    </footer>
    <footer class="copyright-footer">
        <h6>Bilal Arif - BC170400198 - 2021</h6>
    </footer>
</section>

<!-- =============   SCRIPTS   ============ -->

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>
</html>