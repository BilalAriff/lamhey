<?php
    include_once "./process/user_dashboard_process.php";
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
                    <h3>User Dashboard</h3>
                    <h1>Welcome, <span style="font-weight: bold;"><?php echo $_SESSION['username']?></span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- User Bookings -->

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Your Bookings</h3>
            </div>
            <div class="row">
                <?php var_dump($bookingList)?>
                id
                event detail
                event description
                consultant
                status
                date
                booked at
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Consultant Name</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Booking Date</th>
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