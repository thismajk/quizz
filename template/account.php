<?php
    if(Auth::islogin() == false){
        header('Location: ?page=login');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="account-box">
                <div class="inside-account-box">
                    <i class="far fa-user-circle align-middle"></i>
                    <h1 class="align-middle"><?=$_SESSION['user']?></h1>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="account-box">
                <div class="inside-account-box">
                    <p>Stowrzone quizzy</p>
                    <input type="number" value="<?=Quizz::getNumUserQuestions($conn);?>" readonly>
                    <p>Rozwiązane quizzy</p>
                    <input type="number" value="<?=Quizz::getUserDoneQuizz($conn)?>" readonly>
                    <p>Pozycja w rankingu</p>
                    <input type="number" value="0" readonly>
                    <p>Wszystkie zdobyte punkty</p>
                    <input type="number" value="0" readonly>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="account-box">
                <div class="inside-account-box">
                    <form>
                        <input type="text" value="<?=Auth::getUserEmail($_SESSION['user'], $conn);?>">
                        <input type="password" placeholder="nowe hasło">
                        <input type="password"  placeholder="powtórz nowe hasło">
                        <input type="submit" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="box">
                <h2>Rozwiązane quizzy</h2>
            </div>
            <?=Quizz::getScore($conn);?>


        </div>
        <div class="col-6">
            <div class="box">
                <h2>Stowrzone quizzy</h2>
            </div>
            <?=Quizz::getUserQuestions($conn)?>
        </div>
    </div>
</div>
