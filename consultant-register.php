<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/register_process.php";
?>


<!DOCTYPE html>
<html lang="en">

<?php include "./partials/Head.php"?>

<body>

<!-- Navigation -->

<?php include_once "./partials/Navigation.php" ?>

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
                                    <input required name="profile_image" class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consultant_type">Profile Type</label>
                                <select required class="form-control" name="consultant_type" id="consultant_type">
                                    <option value="Individual Consultant">Individual Consultant</option>
                                    <option value="Resturant">Resturant</option>
                                    <option value="Marriage Hall">Mariage Hall</option>
                                    <option value="Marquee">Marquee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label  for="about">Write something abour yourself</label>
                                <textarea required class="form-control" name="about" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories">Select your Categories</label>
                            <select multiple="multiple" size="5" class="form-control ultraSelect" name="categories[]" id="categories">
                                <?php echo categoriesOptionList($categories) ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_methods">Add Your Prefered Payment Methods</label>
                            <select multiple="multiple" size="5" class="form-control ultraSelect" name="payment_methods[]" id="paymentMethods">
                                <?php echo paymentMethodList($paymentMethods) ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="uername">Username</label>
                            <input required name="username" id="reg_username" type="text" class="form-control" placeholder="Username123" required>
                            <h5 class="text-danger" id="usercheck"></h5>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required name="email" id="reg_email" type="email" class="form-control" placeholder="jhondoe@gmail.com" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input required class="form-control" name="firstname" id="reg_firstname" placeholder="Jhon" type="text" required>
                                <h5 id="passcheck" class="text-danger"></h5>
                             </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input required name ="lastname" id="reg_firstname" type="text" class="form-control" placeholder="Doe" required>
                            </div>
                        </div>
                        <input type="hidden" value="1" name="rating">
                        <input type="hidden" value="consultant" name="role">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required name ="password" id="reg_Password" type="password" class="form-control" placeholder="***********" required>
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

<!-- =============   SCRIPTS   ============ -->
    <?php include "./partials/ScriptTags.php" ?>
    <script>
        $(document).ready(function () {
            $("#categories").ultraselect();
            $("#paymentMethods").ultraselect();
        });
    </script>
</body>
</html>