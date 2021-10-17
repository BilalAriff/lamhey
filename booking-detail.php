<?php
    include_once "./process/booking_detail_process.php";
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
                <div class="offset-sm-2 offset-md-2 col-sm-12 col-md-8">
                    <div class="theme-border-box">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="theme-heading">your Booking ID is <span
                                        class="text-underline text-success"><?php echo $booking['booking_id']?></span>
                                </h1>
                                <h6 class="theme-heading">
                                    <?php echo $booking['booking_date']?>
                                </h6>
                                <label
                                    class="<?php echo $booking['booking_status'] ?> rounded-pill px-5"><?php echo $booking['booking_status'] ?></label>
                                <p><strong class="theme-heading">Host:</strong> <a
                                        href="consultant-profile.php?id=<?php echo $booking['booking_consultant']?>">
                                        <?php echo $booking['booking_consultant_username']?> </a></p>
                                <p><strong class="theme-heading">Event</strong> <a
                                        href="event-detail-page.php?id=<?php echo $booking['booking_event']?>"><?php echo $booking['booking_event_name']?></a>
                                </p>
                                <Br>
                                <h5>Description</h5>
                                <p><?php echo $booking['booking_description']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <form action="" method="post">
                                    <?php
                                    if($_SESSION['role'] == 'consultant') {
                                        echo bookingOptions($bookingStatus);
                                    }
                                    ?>
                                </form>
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