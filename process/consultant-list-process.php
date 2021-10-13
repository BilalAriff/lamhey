<?php

$app = new App();
$h = new Helper();
$consultant = new Consultant("consultant-list");
$categoryList = $app->getAllCategories();

$consultantListData = $consultant->getListOfConsultants();

function category($c) {
    $id = $c['id'];
    $name = $c['name'];

    $_c = <<<HTML
                
        <form method="post" class="category-pill rounded-pill">
            <input type="hidden" name="search_consultant_category" value="$name">
                <span><button class="category-pill-submit-btn" type="submit" name="search_by_consultant_category" value="search_by_event_category">$name</button></span>
            </form>    
HTML;

echo $_c;
}



function makeConsultantList($_consultant) {

    $id = $_consultant['id'];
    $username = $_consultant['username'];
    $consultant_type = $_consultant['consultant_type'];
    $state = $_consultant['state'];
    $city = $_consultant['city'];
    $rating = $_consultant['rating'];
    $avatar = $_consultant['profile_image'];
    
    $card = 
        <<<HTML
            <div class="col-2">
            <a href="consultant-profile?id=$id">
                <div class="consultant-card my-2">
                    <div class="consultant-card-header">
                        <img src="$avatar" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">$username</h5>
                        <p class="consultant-card-type">$consultant_type</p>
                        <p class="consultant-card-location">$city, $state</p>
                        <h4 class="consultant-card-rating">$rating.0</h4>
                    </div>
                </div>
            </a>
            </div>
        HTML;
    echo $card;
}

function consultantList($_consultantData) {
    array_map("makeConsultantList", $_consultantData);
}

function categoryList($data) {
    array_map("category", $data);
}

if(!isset($_POST["search-submit"])) {
    
} else {
    $consultantListData = $app->searchConsultants($_POST["consultant_search"]);   
}

if(isset($_POST['search_by_consultant_category'])) {
    $consultantListData = $app->searchConsultantsByCategory($_POST['search_consultant_category']);   
}






















