<?php

include_once "include_files.php";


$app = new App();
$result = $app->searchEventsByCategory("birthday");
var_dump($result);



