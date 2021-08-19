<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/create_event_process.php";

    // if( empty($_SESSION) || $_SESSION['role'] !== 'consultant') {
    //     header("Location: index.php");
    // }
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
                <div class="event-creation-form">

                    <!-- <form action="" method="post">
                        <div class="form-group" enctype="multipart/form-data">
                            <label for="">Event Image</label>
                            <input type="file" name="eventImage">
                        </div>
                    </form> -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" >
                            <label for="">Event Image</label>
                            <input type="file" name="eventImage">
                        </div>
                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" required name="eventName" value="eventName">
                        </div>
                        <div class="form-group">
                            <label for="">Event Description</label>
                            <input type="text" required name="eventDescription"   value="eventDescription">
                        </div>
                        <div class="form-group">
                            <label for="">Event Host</label>
                            <input value="eventHost" type="text" required name="eventHost">
                        </div>
                        <div class="form-group">
                            <label for="">Event Category</label>
                            <input value="eventCategory" type="text" required name="eventCategory">
                        </div>
                        <div class="form-group">
                            <button name="submit" value="submit"  type="submit">Create Event</button>
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