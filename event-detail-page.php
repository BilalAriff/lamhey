<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/event_detail_page_process.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once "./partials/Head.php";?>

<body>

    <!-- Navigation -->
    <?php include_once "./partials/Navigation.php";?>

    <section class="event-detail-page-section my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="theme-heading text-underline">Event Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="event-thumbnail">
                        <img src="<?php echo $event['event_thumbnail']?>" class="w-100">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="event-description">
                        <h1 class="event-title text-capitalize"><?php echo $event['event_title'] ?></h1>
                        <h5 class="event-price"><?php echo $event['event_price']; echo eventFeatured($eventFeatured); ?></h5>
                        <p class="event-description-tag"><?php echo $event['event_description'] ?></p>
                    </div>
                    <div class="book-now">
                    <?php
                        if(isset($_SESSION['role'])) {
                            if($_SESSION['role'] == 'user') {
                                bookingBtn($eventBooked);
                            }
                            if($_SESSION['role'] == 'consultant') {
                                echo "";
                            }
                        }
                        if(!isset($_SESSION['role'])) {
                            echo "Please <a href='login.php'>Log In</a> Log in to Book This Event!";
                        }
                    ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="theme-blue-border">
                        <div class="host-profile">
                            <div class="host-profile-image">
                                <img class="w-100" src="<?php echo $consultantInfo['profile_image'];?>" alt="">
                            </div>
                            <div class="host-bio">
                                <h5 class="host-name"><?php echo $consultantInfo['firstname'].' '.$consultantInfo['lastname'];?></h5>
                                <span class="host-type"><?php echo $consultantInfo['consultant_type'];?></span>
                            </div>
                            <div class="view-profile">
                                <a href="consultant-profile.php?id=<?php echo $consultantInfo['id'];?>">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-page-section my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="event-detail primary-border border-2px border-radius-25">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list d-flex justify-content-center align-items-center">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Your Booking Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="book-event-form" action="" method="post">
                                        <input type="hidden" name="event_id" value="<?php echo $event["event_id"] ?>">
                                        <input type="hidden" name="booking_consultant" value="<?php echo $event["event_host"]?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["userID"]?>">
                                        <input type="hidden" name="user_username" value="<?php echo $_SESSION["username"]?>">
                                        <input type="hidden" name="event_name" value="<?php echo $event["event_title"]?>">
                                        <input type="hidden" name="consultant_name" value="<?php echo $event["event_host_name"]?>">

                                        <div class="form-group">
                                            <label for="">Enter your Description with Complete Details</label>
                                            <textarea name="description" required class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select your event Date</label>
                                            <input type="date" required class="form-control" name="date">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-dark" name="confirm_booking" value="confirm_booking">Confirm Booking</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                 </div>
                            </div>
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