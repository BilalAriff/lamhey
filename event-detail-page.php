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
                        <?php var_dump($event)?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Book Event
                    </button>

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