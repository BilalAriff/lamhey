<?php

include_once "include_files.php";


$app = new App();
$result = $app->isProfileBlocked("BilalConsultant", "consultants");

if( $result) {
    echo "profile is fine";
}

else { 
    echo "profile is blocked";
}



