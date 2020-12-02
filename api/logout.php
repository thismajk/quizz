<?php
require_once "../conf.php";

if(!Auth::logout()){
    echo "nie udało się wylogować";
}
else{
    Header("location: ../index.php");
}
