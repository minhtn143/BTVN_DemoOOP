<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../class/Student.php";
    include "../class/StudentManager.php";
    $index = (int)$_REQUEST['index'];
    var_dump($_REQUEST);

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    $newInfo = new Student($name, $email, $phone);
    var_dump($_REQUEST);
    $studentManager = new StudentManager("../data/data.json");
    $studentManager->updateInfoStudent($index,$newInfo);
    var_dump($studentManager);
    header("Location: ../index.php");
}