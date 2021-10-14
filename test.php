<?php

include_once "include_files.php";


$app = new App();
$customEvent = new CustomEvent();

$req = $customEvent->getConsultantCustomReqest("1");

var_dump($req);

