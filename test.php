<?php

include_once "include_files.php";


$app = new App();
$customEvent = new CustomEvent();

$req = $customEvent->getConsultantCustomRequest("16");

var_dump($req);

