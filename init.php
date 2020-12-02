<?php
session_start();
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

require_once BASE_DIR."/incl/auth.php";
require_once BASE_DIR."/incl/quizz.php";

function GET(string $key, bool $required = false, bool $secure = true) {
    if(!isset($_GET[$key])) {
        if($required) {
            http_response_code(400);
            exit("ERROR: GET parameter $key is required");
        }
        else {
            return null;
        }
    }

    $return_value = $_GET[$key];

    if($secure) {
        $return_value = htmlentities($return_value);
    }

    return $return_value;
}

function POST(string $key, bool $required = false, bool $secure = true) {
    if(!isset($_POST[$key])) {
        if($required) {
            http_response_code(400);
            exit("ERROR: POST parameter $key is required");
        }
        else {
            return null;
        }
    }

    $return_value = $_POST[$key];

    if($secure) {
        $return_value = htmlentities($return_value);
    }

    return $return_value;
}