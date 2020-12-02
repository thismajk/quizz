<?php
switch (GET("page")){
    case "main":
        require_once BASE_DIR."/template/main.php";
        break;
    case "login":
        require_once BASE_DIR."/template/login.php";
        break;
    case "quizz":
        require_once BASE_DIR."/template/quizz.php";
        break;
    case "register":
        require_once BASE_DIR."/template/register.php";
        break;
    case "account":
        require_once BASE_DIR."/template/account.php";
        break;
    case "createQuizz":
        require_once BASE_DIR."/template/createQuizz.php";
        break;
    case "endQuizz":
        require_once BASE_DIR."/template/endquizz.php";
        break;
    default:
        require_once BASE_DIR."/template/main.php";
        break;
}
