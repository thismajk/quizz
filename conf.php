<?php
//path to the main folder
define("BASE_DIR", "C:\\xampp\\htdocs\\quizz");

// Mysqli Data Base
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "quizz");

// Auth
define("SESSION_COOKIE_NAME", "session");
define("SESSION_EXPIRE_DAYS", 30);
define("PASSWORD_HASH_ALGO", PASSWORD_DEFAULT);
// Users DB
define ("USER_USERNAME_MAX_LEN", 32);

//Domain
define ("DOMAIN", "localhost");

//init
require_once BASE_DIR."/init.php";