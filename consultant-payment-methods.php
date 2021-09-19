<?php
    session_start();
    include_once "include_files.php";
    include_once "./process/consultant-pm-process.php";
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
                    <div class="login-form">
                        <div class="form-group text-center">
                            <h2>Add your desired Payment Methods</h2>
                        </div>
                        <form action="" method="post">
                            <div class="form-check">
                                <?php paymentList($paymentMethodList) ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" name="submit" value="submit">Sumbit</button>
                            </div>
                        </form>
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