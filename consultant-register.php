<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/register_process.php";
    
    // if (isset($_POST['submit'])){
        
    //     var_dump($_FILES["profile_image"]);
    //     echo "<br>";
    //     echo $_POST["consultant_type"];
    //     echo "<br>";
    //     echo $_POST["role"];
    //     echo "<br>";
    //     echo $_POST["about"];
    //     echo "<br>";
    //     echo $_POST["rating"];
    //     echo "<br>";
    //     echo $_POST["username"];
    //     echo "<br>";
    //     echo $_POST["email"];
    //     echo "<br>";
    //     echo $_POST["firstname"];
    //     echo "<br>";
    //     echo $_POST["lastname"];
    //     echo "<br>";
    //     echo $_POST["password"];
    //     echo "<br>";
    //     echo $_POST["address"];
    //     echo "<br>";
    //     echo $_POST["city"];
    //     echo "<br>";
    //     echo $_POST["zip"];
    //     echo "<br>";
    //     echo $_POST["state"];
    //     echo "<br>";
    // }
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
                        <h6>Create <span class="text-success">Consultant</span> Profile</h6>
                        <h4 class="text-success"><?php echo $Msg ?></h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="consultant-profile-section">
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <div class="upload-consultant-profile-photo">
                                    <label for="profile_image">Profile Photo</label>
                                    <input name="profile_image" class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consultant_type">Profile Type</label>
                                <select class="form-control" name="consultant_type" id="consultant_type">
                                    <option value="Individual Consultant">Individual Consultant</option>
                                    <option value="Resturant">Resturant</option>
                                    <option value="Marriage Hall">Mariage Hall</option>
                                    <option value="Marquee">Marquee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about">Write something abour yourself</label>
                                <textarea class="form-control" name="about" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uername">Username</label>
                            <input name="username" id="reg_username" type="text" class="form-control" placeholder="Username123" required>
                            <h5 class="text-danger" id="usercheck"></h5>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="reg_email" type="email" class="form-control" placeholder="jhondoe@gmail.com" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input class="form-control" name="firstname" id="reg_firstname" placeholder="Jhon" type="text" required>
                                <h5 id="passcheck" class="text-danger"></h5>
                             </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input name ="lastname" id="reg_firstname" type="text" class="form-control" placeholder="Doe" required>
                            </div>
                        </div>
                        <input type="hidden" value="1" name="rating">
                        <input type="hidden" value="consultant" name="role">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name ="password" id="reg_Password" type="password" class="form-control" placeholder="***********" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confrim Password</label>
                            <input name ="confirm_password" id="reg_confirm_Password" type="password" class="form-control" placeholder="***********" required>
                            <h5 id="conpasscheck" class="text-danger"></h5>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" id="reg_address" type="text" class="form-control" placeholder="Apartment, studio, or floor" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <input name="city" id="reg_city" type="text" class="form-control" id="inputCity" required>
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select name="state" id="inputState" class="form-control" required>
                                <option selected>Sindh</option>
                                <option>Balochistan</option>
                                <option>Punjab</option>
                                <option>Azad Kashmir</option>
                                <option>Sindh</option>
                            </select>
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputZip">Zip</label>
                            <input name="zip" type="text" class="form-control" id="inputZip" required>
                            </div>
                        </div>
                        <input type="hidden" name="role" value="consultant">
                        <!-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" value="consultant" type="radio" name="_role" id="flexRadioDefault1" required>
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
                        </div> -->
                        <div class="form-group">
                            <h5 class="text-danger"><?php echo $msg; ?></h5>
                        </div>
                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" name="submit" value="submit" id="Regsubmitbtn" class="btn w-100 bg-dark text-white">Register</button>                            
                                </div>
                                <div class="col-6">
                                    <input type="reset" class="btn bg-danger w-100 text-white">                            
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="btn bg-primary text-white w-100" href="register.php">Do You Want To Create User Profile?</a>
                        </div>
                        <div class="form-group text-center">
                            <p>Already have a account?<a href="login.php"> LOG IN</a></p>
                        </div>
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