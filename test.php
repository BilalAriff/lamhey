<?php

include_once "include_files.php";

$admin = new Event("dfd");

// $app = new App();
// $customEvent = new CustomEvent();
// $event = new Event("d");

// $booked = $app->isEventBooked("16", "40");

// var_dump($booked);

// $req = $customEvent->getConsultantCustomRequest("16");

// var_dump($req);

$result =  $admin->isEventFeatured("18");

var_dump($result);


