<?php
    include_once "process/consultant_dashboard_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "./partials/Head.php"; ?>

<body>
    <?php include_once "./partials/Navigation.php" ?>

        <!-- User Profile Navigation -->

    <section class="profile-navigation-section bg-light-blue mt-3 sticky-top">
        <ul class="nav">
            <li class="nav-item">
                <a href="create-event.php" class="nav-link mr-2">Create Event</a>
            </li>
            <li class="nav-item">
                <a href="add-portfolio.php" class="nav-link mr-2">Add Portfolio</a>
            </li>
            <li class="nav-item">
                <a href="add-portfolio.php" class="nav-link mr-2">Add Payment Methods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="consultant-profile.php?id=<?php echo $consultantId?>">View Your Public Profile</a>
            </li>
        </ul>
    </section>

    <!-- Header -->

    <div class="jumbotron bg-light-blue mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Consultant Dashboard</h3>
                    <h1>Welcome, <span style="font-weight: bold;"><?php echo $_SESSION['username']?></span></h1>
                </div>
            </div>
        </div>

    </div>

    <!-- User Bookings -->

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Your Events</h3>
            </div>
        </div>
        <div class="row">
            <?php eventsList($eventListData)?>
        </div>
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Your Booking Requests</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Username</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Booking Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo bookingListRow($bookingList) ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "./partials/Footer.php" ?>
    <?php include_once "./partials/ScriptTags.php" ?>
</body>

</html>