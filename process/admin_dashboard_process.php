<?php
session_start();
include_once "include_files.php";

$h = new Helper();
$admin = new Admin("admin");

$bookingList = $admin->getBookingList();

var_dump($bookingList);
