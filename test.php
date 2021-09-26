<?php

session_start();
include_once "include_files.php";

$b = new Booking();

$b->changeBookingStatus("7", "accepted");


