<?php

session_start();
include_once "include_files.php";

$events = new Event("HomeEvents");
$consultant = new Consultant("featuredConsultant");

$featuredConsultants = $consultant->featuredConsultants();
$featuredEvents = $events->getFeaturedEvents();


// EVENT CARD

function featuredEventCard($event) {   
    $id = $event['event_id'];
    $title = $event['event_title'];
    $thumbnail = $event['event_thumbnail'];
    $price = $event['event_price'];
    $host = $event['event_host'];
    $hostAvatar = $event['event_host_avatar'];
    $hostName = $event['event_host_name'];
    $description = $event['event_description'];
    $categories = $event['event_categories'];
    $featured = $event['event_featured'];
    $date = $event['event_created'];

    $card = 
    <<<HTML
        <div class="event-card mx-3">
            <div class="event-card-header">
                <img src="$thumbnail" alt="">
            </div>
            <div class="event-card-body">
                <h5 class="event-card-title">$title</h5>
                <label class="event-card-price">Rs. $price</label>
            </div>
            <div class="event-card-footer">
                <div class="event-card-profile">
                    <div class="event-card-profile-header">
                        <img src="$thumbnail" alt="">
                    </div>
                    <h6 class="event-card-profie-username">$hostName</h6>
                </div>
            <a href="event-detail-page?id=$id" class="event-card-btn">View Event</a>
            </div>
        </div>
    HTML;
    echo $card;
}

function featuredConsultantCard($fConsultant) {   

    $id = $fConsultant['id'];
    $name = $fConsultant['firstname']." ".$fConsultant['lastname'];
    $city = $fConsultant['city'];
    $consultantType = $fConsultant['consultant_type'];
    $state = $fConsultant['state'];
    $rating = $fConsultant['rating'];
    $profile = $fConsultant['profile_image'];

    $card = 
    <<<HTML
    <div class="col-sm-12 col-md-3 col-lg-2">
        <div class="consultant-card">
            <div class="consultant-card-header">
                <img src="$profile" alt="">
            </div>
            <div class="consultant-card-body">
                <h5 class="consultant-card-title">$name</h5>
                <p class="consultant-card-type">$consultantType</p>
                <p class="consultant-card-location">$city, $state</p>
                <h4 class="consultant-card-rating">$rating</h4>
                <a href="consultant-profile.php?id=$id">View Profile</a>
            </div>
        </div>
    <div>
    HTML;
    echo $card;
}

// CONSULTANT CARD



function featuredCardList($_events) {
    array_map("featuredEventCard", $_events);
}

function featuredConsultantList($consultant) {
    array_map("featuredConsultantCard", $consultant);
}

