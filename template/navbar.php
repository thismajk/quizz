<div class="nav-container">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><b>Quizz</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse test" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=main">Główna</a>
                </li>
                <?php if(Auth::isLogin() == true){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=createQuizz">Dodaj quizz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=account">konto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/api/logout.php">Wyloguj</a>
                    </li>
                    <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=register">Rejestracja</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</div>
