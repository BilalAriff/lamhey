<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/admin_authentication_process.php";
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
                        <h2>You Can't Access The System</h2>
                        <h4 class="text-danger">Your Profile Is Blocked</h4>
                    </div>
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