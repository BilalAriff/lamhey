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
                    <h4>Search Here..</h4>
                    <form class="form-inline w-100" method="post" action="">
                        <input name="consultant_search" placeholder="Birthday Party, consultantUserName etc....." type="text"
                            class="form-control large-search-field" style="width: 80%; margin-right: 10px;">
                        <button type="submit" name="search-submit" value="search-submit"
                            class="btn bg-light-blue text-white d-inline-block"><i class="fa fa-search"
                                aria-hidden="true"></i> Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="payment-method-list">
                        <?php echo categoryList($categoryList)?>

                        <div method="post" class="category-pill rounded-pill">
                            <span><a href="consultant-list.php" class="font-weight-bold">All Consultants <i class="fa fa-plus"
                                        aria-hidden="true"></i></a></span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="consultant-list">
                        <div class="row">
                            <?php  ?>

                            <?php
                            
                            if(empty($consultantListData)) {
                                echo "<div class='col-12'><h1 class='text-center'> No Consultant Available</h1></div>";
                            } else {
                                consultantList($consultantListData);
                            }

                            ?>
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