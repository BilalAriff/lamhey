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
                <a class="nav-link " href="consultant-profile.php?id=<?php echo $consultantId?>">View Your Public
                    Profile</a>
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
                    <div class="d-flex justify-content-start align-items-center" style="max-width: 400px">
                        <h5 class="text-uppercase my-auto mr-2"><?php echo $consultantAvailablity; ?></h5>
                        <div class="consultant-status <?php echo $consultantAvailablity; ?> mr-3"></div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#changeAvailablity">
                            Change
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="changeAvailablity" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2>Select your status</h2>
                                        <p class="text-danger">NOTE: if your status is <strong>UNAVAILABLE</strong> you won't be shown in search result<br> booking request will not be recieved</p>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <select class="form-control" name="profile_status">
                                                    <option class="text-success" value="available">Available</option>
                                                    <option class="text-danger" value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-center">
                                                <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <button class="btn btn-success" type="submit" name="change_status" value="change_status">Change</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $customEvents
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
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Custom Event Requests</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Event ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo customEventList($customEvents) ?>
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