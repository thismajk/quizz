<div class="container">
    <div class="row">
        <div class="col mt-5 mb-5 ">
            <div class="bg-white text-center p-5 shadow">
                <h1>Witaj na quizz! Tutaj z łatwością stworzysz swój własny quizz ;)</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card-body shadow">
                <p class="card-text">Kliknij tutaj aby storzyć nowy quizz!</p>
                <br>
                <a href="?page=createQuizz" class="quizz-link">Dodaj nowy quizz</a>
            </div>
        </div>

        <?php
            quizz::getAllQuizz($conn);
        ?>

    </div>
</div>
