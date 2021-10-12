<?php 

$h = new Helper();
$app = new App();
$events = new Event("eventProcessPage");

// $searchCategory = "all";

$searchCategory = $h->getURLParams("category");
$allEvents = $events->getEventList();
$categoryList = $app->getAllCategories();

// var_dump($categoryList);

function categoryData($category) {
    if(!isset($category)) {
        echo "no category selected";
    } else {
        echo $category;
    }
}

categoryData($searchCategory);

function category($c) {
    $id = $c['id'];
    $name = $c['name'];

    $_c = <<<HTML
                
                    <div class="category-pill rounded-pill">
                        <span><a href="events.php?category=$name">$name</a></span>
                    </div>
                
HTML;

echo $_c;
}


function eventListCard($event)
{   
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
            <a href="event-detail-page.php?id=$id" class="event-card-btn">View Event</a>
            </div>
        </div>
    HTML;
    echo $card;
}
  

function eventsList($_events) {
    array_map("eventListCard", $_events);
}

function categoryList($data) {
    array_map("category", $data);
}