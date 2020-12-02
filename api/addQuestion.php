<?php
require_once ('../conf.php');

$key = POST("key");
$question = POST("question", true, true);
$answer1 = POST("answer1", true, true);
$answer2 = POST("answer2", true, true);
$answer3 = POST("answer3", true, true);
$answer4 = POST("answer4",  true, true);
$correctAnswer = POST("correctAnswer", true);

echo "question info: ". $key ." : ". $question ." : ". $answer1 ." : ". $answer2 ." : ". $answer3 ." : ". $answer4 ." : ".$correctAnswer;

if(Quizz::keyVerify($conn, $key) != true){
    header('location: ../?page=main');
}
Quizz::addQuestion($conn, $key, $question, $answer1, $answer2, $answer3, $answer4, $correctAnswer);

header('Location: ../index.php?page=createQuizz&key='.$key);

?>