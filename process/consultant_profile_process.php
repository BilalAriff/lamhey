<?php
    session_start();
    include_once "include_files.php";
    $helper = new Helper();
    $profileID = $helper->getURLParams("id");

    // $helper->protectedRoute($_SESSION["role"], "user");

    // $guest = new Guest("guest");
    $events = new Event("consultantEvents");
    $consultant = new Consultant($profileID);
    $consultantProfile = new ConsultantProfile($profileID);
    $portfolio = new Portfolio();
    $complaint = new Complaint();

    $profile_details = $consultantProfile->getConsultantProfileDetails($profileID);
    $featuredEvents = $events->getEventListByConsultant($profileID);
    $videoPortfolio = $portfolio->getConsultantVideoPortfolio($profileID);
    $photoPortfolio = $portfolio->getConsultantPhotoPortfolio($profileID);
    var_dump($videoPortfolio);

function videoPortfolioItem($item) {

    $portfolioTitle = $item['portfolio_title'];
    $portfolioLink = $item['portfolio_link'];
    $portoflioDescription = $item['portfolio_title'];
    $portoflioConsultant = $item['portfolio_title'];
    $portoflioCategories = $item['portfolio_title'];
    $portoflioDate = $item['portfolio_title'];

    $_item =
    <<<HTML
        <div class="col-4">
            <div class="video-portfolio">
                <div class="video-portfolio-header">
                    <video width="320" height="240" controls autoplay muted>
                        <source src="$portfolioLink" type="video/mp4">
                    </video>
                </div>
                <div class="video-portfolio-body">
                    <h5>$portfolioTitle</h5>
                    <p>$portoflioDescription</p>
                </div>
            </div>
        </div>
    HTML;

    echo $_item;
}

function photoPortfolioItem($item) {

    $portfolioTitle = $item['portfolio_title'];
    $portfolioLink = $item['portfolio_link'];
    $portoflioDescription = $item['portfolio_title'];
    $portoflioConsultant = $item['portfolio_title'];
    $portoflioCategories = $item['portfolio_title'];
    $portoflioDate = $item['portfolio_title'];

    $_item =
    <<<HTML
        <a class="lightboxgallery-gallery-item" target="_blank"
                href="$portfolioLink" data-title="$portfolioTitle"
                data-alt="$portfolioTitle" data-desc="A lightweight jQuery lightbox gallery plugin.">
            <div>
                <img src="$portfolioLink"
                    title="$portfolioLink" alt="$portfolioLink">
                <div class="lightboxgallery-gallery-item-content">
                    <span class="lightboxgallery-gallery-item-title">$portfolioTitle</span>
                </div>
            </div>
        </a>
    HTML;

    echo $_item;
}

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

function featuredCardList($_events) {
    array_map("featuredEventCard", $_events);
}

function videoPortfolioList($data) {
    array_map("videoPortfolioItem", $data);
}

function photoPortfolioList($data) {
    array_map("photoPortfolioItem", $data);
}

// give user ratings

if (isset($_POST["submit_rating"])) {
  $consultant->addReview($profileID, $profile_details["rating"], $_POST["user_rating"]);   
}

if (isset($_POST['lodge_complaint'])) {

    $complaint->lodgeComplaint($_POST['complaint_user_id'], $_POST['complaint_username'], 
    $_POST['complaint_consultant_id'], $_POST['complaint_consultant_name'], 
    $_POST['complaint_description'], $_POST['complaint_feedback']);
}