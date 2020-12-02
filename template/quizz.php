<div class="container">
    <div class="row">
        <div class="col mt-5 mb-5 shadow">
            <div class="p-4">
                <form method="post" action="api/checkAnswer.php">
                    <?php quizz::getQuizz($conn, GET("id")) ?>
                    <input type="submit" class="btn-quizz" value="Sprawdź odpowiedzi">
                    <div style="clear:both"></div>
                    <input type="hidden" name="quizzId" value = "<?php echo GET("id");?>">
                </form>

                Id Quizzu: <?php echo GET("id");?></div>
            </div>
        </div>
    </div>
</div>
