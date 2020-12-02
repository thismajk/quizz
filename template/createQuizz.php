<?php
    if (Auth::islogin() == false) {
        header('Location: ?page=login');
    }

    if(GET('key') != null){
        require_once("questions.php");
    }
    else{
        require_once("newQuizz.php");
    }

