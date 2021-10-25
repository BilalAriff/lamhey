<?php

    $Msg = "";
    session_start();
    include_once "include_files.php";
    include_once "process/add_portfolio_process.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <title>Home - Lamhey</title>
</head>
<body>

<!-- Navigation -->

<?php include_once('partials/navigation.php')?>

<section class="login-page-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 offset-md-3 col-sm-12 col-md-6">
                <div class="login-form">
                    <div class="form-group text-center">
                        <h2>Add Your Portfolio</h2>
                        <h4><?php echo $Msg?></h4>
                        <h4 class="text-success"><?php echo $Msg ?></h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Thumbnail">Thumbnail</label>
                            <input required type="file" name="link">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input required name="title" placeholder="Educational Seminar" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea required name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <input required name="consultant" type="hidden" value="<?php echo $_SESSION['consultantInfo']['id']?>">
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select required name="categories" class="form-control">
                                <?php echo categoryList($categories)?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input required name="date" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="type" class="form-control" id="">
                                <option value="video">Video</option>
                                <option value="Photo">Photo</option>
                            </select>
                            <!-- <div class="row">
                                <div class="col-6">
                                    <label for="photo">Photo</label>
                                    <input required type="radio" name="type" value="photo">
                                </div>
                                <div class="col-6">
                                    <label for="video">Video</label>
                                    <input required type="radio" name="type" value="video">
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" value="submit" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<?php include_once('partials/footer.php')?>

<!-- =============   SCRIPTS   ============ -->

<?php include_once('partials/ScriptTags.php')?>

</body>
</html>