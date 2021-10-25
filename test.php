<?php

include_once "include_files.php";

$admin = new Event("dfd");

$app = new App();

$status = $app->isProfileBlocked("BilalConsultant", 'consultants');

if ($status == true) {
    echo "blocked";
}

if ($status == false) {
    echo "fine";
}



