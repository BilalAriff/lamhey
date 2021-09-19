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
                <h1>Welcome to Events</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="list d-flex justify-content-center align-items-center">
                    <?php var_dump($event)?>
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