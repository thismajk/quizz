<?php
require_once("../conf.php");

$quizzId = POST("quizzId");

$query = mysqli_query($conn, "SELECT correct_answer FROM questions WHERE quizz_id = ".$quizzId);

$questionCount = 1;
$correctAnswerCount = 0;

While($row = mysqli_fetch_array($query)){
    if(POST($questionCount) == $row['correct_answer']){
        $correctAnswerCount++;
    }
    echo "answ: ".POST($questionCount)."corr-answ: ".$row['correct_answer']."<br />";
    $questionCount++;
}

$questionCount--;
if(Auth::isLogin() == true){
    $user =  $_SESSION['user'];
    Quizz::addScore($conn, $quizzId, $user, $correctAnswerCount, $questionCount);
    $desc = "Twoj wynik quizzu został pomyślnie zapisany";
}
else{
    $desc = "Z powodu braku zalogowania twój quizz nie został zapisany!";
}

header('Location: ../index.php?page=endQuizz&score='.$correctAnswerCount.'&maxscore='.$questionCount.'&desc='.$desc);


echo "Poprawne odpowiedzi: ".$correctAnswerCount."/".$questionCount;
