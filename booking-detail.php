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
                    <div class="login-form">
                        <div>
                            <?php var_dump($booking)?>
                        </div>
                        <div class="text-center">
                            <form action="" method="post">
                                <?php
                                    $btn = <<<HTML
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-danger mr-4">
                                                    Reject
                                                    <input type="radio" name="action" value="rejected">
                                                </label>
                                                <label class="btn btn-success">
                                                    Accept
                                                    <input type="radio" name="action" value="accepted">
                                                </label>
                                            </div>
                                            <div class="form-group text-center mt-4">
                                                <button type="submit" name="submit" value="submit"
                                                class="btn btn-dark">Confirm</button>
                                             </div>
                                            HTML;
                                    if($_SESSION['role'] == 'consultant') {
                                        echo $btn;
                                    }
                                    ?>
                            </form>
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