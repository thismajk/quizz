<?php
require_once("../conf.php");

if (Auth::islogin() == false) {
    header('Location: ?page=login');
}
$key = Quizz::createQuizz($conn, POST('title'));

header("location: ../index.php?page=createQuizz&key=".$key);