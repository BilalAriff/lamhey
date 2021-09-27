<?php

$h = new Helper();
$consultant = new Consultant("consultant-list");

$consultantListData = $consultant->getListOfConsultants();

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

?>      