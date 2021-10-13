<?php
    session_start();
    include_once "include_files.php";
    include_once "process/create_event_process.php";

    if( empty($_SESSION) || $_SESSION['role'] !== 'consultant') {
        header("Location: index.php");
    }

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
                            <input required class="form-control-file"  type="file" name="eventThumbnail">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input required class="form-control" type="text" required name="eventTitle" value="eventName">
                        </div>
                        <input type="hidden" name="eventHostID" value="<?php echo $_SESSION['consultantInfo']['id']?>">
                        <input type="hidden" name="eventHostAvatar" value="<?php echo $_SESSION['consultantInfo']['profile_image']?>">
                        <input type="hidden" name="eventHostName" value="<?php echo $_SESSION["consultantInfo"]["username"] ?>">
                        <div class="form-group">
                            <label for="starting_price">Starting Price</label>
                            <input required type="number" class="form-control" name="eventPrice">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea required class="form-control" name="eventDescription" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select required class="form-control" name="eventCategory">
                                <?php echo categoryList($categories)?>
                            </select>
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

<!-- Footer -->s
<?php include_once "./partials/Footer.php"?>

<!-- =============   SCRIPTS   ============ -->

<?php include_once "./partials/ScriptTags.php" ?>

</body>
</html>