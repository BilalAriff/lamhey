<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/consultant-list-process.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once "./partials/Head.php";?>

<body>

    <!-- Navigation -->
    <?php include_once "./partials/Navigation.php";?>

    <section class="consultant-list-section">
        <div class="jumbotron bg-light-blue my-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-white">Find your Best Consultant Now</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-2">
            <div class="row">
                <div class="col-12">
                    <div class="consultant-list">
                        <div class="row">
                            <?php consultantList($consultantListData) ?>
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