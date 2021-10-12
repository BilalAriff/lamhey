<?php

$app = new App();
$h = new Helper();
$portfolio = new Portfolio();

$categories = $app->getAllCategories();

function catOption($category)
{   
    $cat = $category['name'];

    $catOption = 
    <<<HTML
        <option value="$cat">$cat</option>
    HTML;
    echo $catOption;
}


function categoryList($data) {
    array_map("catOption", $data);
}

if (isset($_POST['submit'])) {

        $title = $_POST["title"];  
        $userFolderName = $_SESSION['username'];

        $file_tmp = $_FILES['link']['tmp_name'];
        $file_name = $_FILES['link']['name'];
        $file_size = $_FILES['link']['size'];
        $file_type = $_FILES['link']['type'];

        // change the name below for the folder you want

        $h->createUserFolder($userFolderName);

        $file_location = "uploads/".$userFolderName."/".$file_name;
        

        move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name);

        // $portfolio->createPortfolio( $_POST["title"],
        //                              $file_location,
        //                              $_POST["description"],
        //                              $_POST["consultant"],
        //                              $_POST["categories"],
        //                              $_POST["date"],
        //                              $_POST["type"]);
                
                echo $file_location;
                var_dump($_POST);
    
        }