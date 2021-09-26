<?php

session_start();
include_once "include_files.php";

$events = new Event("test");

$eventList = $events->getEventListByConsultant("16");

var_dump($_SESSION);

echo $_SESSION['userID'];
