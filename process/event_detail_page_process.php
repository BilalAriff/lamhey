<?php 

$events = new Event("eventProcessPage");
$helper = new Helper();

$eventID = $helper->getURLParams("id");

$event = $events->getEvent($eventID);
