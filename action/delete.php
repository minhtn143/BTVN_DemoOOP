<?php

include "../class/Student.php";
include "../class/StudentManager.php";
$index = (int)$_GET['index'];

$studentManager = new StudentManager("../data/data.json");
var_dump($studentManager);

$studentManager->deleteStudent($index);
var_dump($studentManager);

header("Location: ../index.php");