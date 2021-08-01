<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once "./partials/Head.php"; ?>
<body>
    <?php include_once "./partials/Navigation.php" ?>

    <!-- Header -->
    
    <div class="jumbotron bg-dark mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-white">Admin Dashboard</h3>
                    <h1 class="text-white">Welcome, <span style="font-weight: bold;"><?php echo $_SESSION['username']?></span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- User Bookings -->

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Monthly Reports</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>User Profiles</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Consultant Profile</h3>
            </div>
        </div>
    </div>

    <?php include_once "./partials/Footer.php" ?>
    <?php include_once "./partials/ScriptTags.php" ?>
</body>
</html>