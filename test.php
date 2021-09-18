<?php

session_start();
include_once "include_files.php";



  

$myEvent = new Event("myEvent");

$events = $myEvent->getEventList();

// var_dump($event);

function featuredEventCard($event)
{   
    $id = $event['event_id'];
    $title = $event['event_title'];
    $thumbnail = $event['event_thumbnail'];
    $price = $event['price'];
    $host = $event['event_host'];
    $hostAvatar = $event['event_host_avatar'];
    $hostName = $event['event_host_name'];
    $description = $event['event_description'];
    $categories = $event['event_categories'];
    $featured = $event['event_featured'];
    $date = $event['event_created'];

    $card = 
    <<<HTML
        <div class="event-card">
            <div class="event-card-header">
                <img src="$thumbnail" alt="">
            </div>
            <div class="event-card-body">
                <h5 class="event-card-title">$title</h5>
                <label class="event-card-price">$price</label>
            </div>
            <div class="event-card-footer">
                <div class="event-card-profile">
                    <div class="event-card-profile-header">
                        <img src="$thumbnail" alt="">
                    </div>
                    <h6 class="event-card-profie-username">$hostName</h6>
                </div>
            <a href="/event_detail?id=$id" class="event-card-btn">View Event</a>
            </div>
        </div>
    HTML;
    echo $card;
}
  
// $arr1 = array(1, 2, 3, 4, 5);

function cardList($_events) {
    print_r(array_map("featuredEventCard", $_events));
}

cardList($events);

// var_dump($events);
