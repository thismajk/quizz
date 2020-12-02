<?php
    $key = GET("key");
    if(Quizz::keyVerify($conn, $key) != true){
        header('location: ?page=main');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <h1><?=Quizz::getTitle($conn, $key)?></h1>
                <p><?=DOMAIN.Quizz::getLink($conn, $key)?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="box">
                <div class="form2">
                    <h4>dodaj pytanie</h4>
                    <form method="post" action="api/addQuestion.php">
                        <input type="text" placeholder="Pytanie" name="question">
                        <input type="text" placeholder="Odpowiedź 1" name="answer1">
                        <input type="text" placeholder="Odpowiedź 2" name="answer2">
                        <input type="text" placeholder="Odpowiedź 3" name="answer3">
                        <input type="text" placeholder="Odpowiedź 4" name="answer4">
                        <input type="number" placeholder="Odpowiedź poprawna np. (3)" name="correctAnswer">
                        <input type="hidden" value="<?=$key?>" name="key">
                        <input type="submit" value="dodaj">
                    </form>
                </div>
            </div>


        </div>
        <div class="col-6">
            <div class="box">
                <h4>Pytania</h4>
                <?=Quizz::getQuestions($conn, $key)?>
            </div>
            <a href="<?=Quizz::getLink($conn, $key)?>" class="btn-outsite">Przejź do quizzu</a>
        </div>
    </div>
</div>