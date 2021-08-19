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
                <div class="event-creation-form login-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" >
                            <label for="">Image</label>
                            <input class="form-control-file"  type="file" name="eventImage">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" required name="eventName" value="eventName">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input class="form-control" type="text" required name="eventDescription"   value="eventDescription">
                        </div>
                        <div class="form-group">
                            <label for="">Host</label>
                            <input class="form-control" value="eventHost" type="text" required name="eventHost">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <input class="form-control" value="eventCategory" type="text" required name="eventCategory">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" name="submit" value="submit"  type="submit">Create Event</button>
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