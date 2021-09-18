<?php

session_start();
include_once "include_files.php";

$myEvent = new Event("myEvent");

$event = $myEvent->updateEventPricing("100000", "2");

var_dump($event);