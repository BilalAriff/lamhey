<?php
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once "./partials/Head.php"; ?>
<body>
    <?php include_once "./partials/Navigation.php" ?>

    <!-- Header -->
    
    <div class="jumbotron bg-light-blue mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Event Name</h3>
                    <h1>Welcome, <span style="font-weight: bold;"><?php echo $_SESSION['username']?></span></h1>
                </div>
            </div>
        </div>
    
    </div>

    <!-- User Bookings -->

    <div class="container">
        
    </div>

    <?php include_once "./partials/Footer.php" ?>
    <?php include_once "./partials/ScriptTags.php" ?>
</body>
</html>