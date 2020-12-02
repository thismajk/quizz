<?php
class Quizz{
    public static function getAllQuizz($conn){
        $query = mysqli_query($conn, 'SELECT * FROM quizz');
        while($row = mysqli_fetch_array($query)){
            ?>
            <div class="col-3">
                <div class="card-body shadow">
                    <p class="card-text"><b><?php echo $row['title'];?></b></p>
                    <b>autor: </b><?php echo $row['author'];?><br ?>
                    <a href="?page=quizz&id=<?php echo $row['id'];?>" class="quizz-link">Przejź do quizzu</a>
                </div>
            </div>
            <?php
        }

    }

    public static function getQuizz($conn, $id){
        $query = mysqli_query($conn, "SELECT * FROM quizz WHERE id=".$id);
        while($row = mysqli_fetch_array($query)){
            echo "<h1>".$row['title']."</h1>";
        }

        $query = mysqli_query($conn, "SELECT * FROM questions WHERE quizz_id=".$id);
        $count = 1;

        while($row = mysqli_fetch_array($query)){
            ?>
            <div class="h4 m-2 mt-4"><?php echo $row['question'];?></div>
            <div class="ml-4 mt-2">
                <label><input type="radio" value="1" name="<?php echo $count;?>"> <?php echo $row['answer1'];?></label><br />
                <label><input type="radio" value="2" name="<?php echo $count;?>"> <?php echo $row['answer2'];?></label><br />
                <label><input type="radio" value="3" name="<?php echo $count;?>"> <?php echo $row['answer3'];?></label><br />
                <label><input type="radio" value="4" name="<?php echo $count;?>"> <?php echo $row['answer4'];?></label>
            </div>

            <?php
            $count++;
        }
    }

    public static function createQuizz($conn, $title){
        if(Auth::isLogin() == true){
            $user = $_SESSION["user"];
            $key = "Q".Date(YmdHis).rand(000,999);
            mysqli_query($conn, "INSERT INTO quizz VALUES (NULL, '$title', '$user', '$key')");
        }
        return $key;
    }

    public static function keyVerify($conn, $key) : bool{
        if(Auth::isLogin() == false){
            return false;
        }
        $user = $_SESSION["user"];
        $query = mysqli_query($conn, "SELECT * FROM quizz WHERE author = '$user' && secretKey = '$key'");
        $numRow = mysqli_num_rows($query);

        if($numRow == 0){
            return false;
        }

        return true;
    }

    public static function getTitle($conn, $key){
        if(Quizz::keyVerify($conn, $key) != true){
            return false;
        }
        $query = mysqli_query($conn, "SELECT title FROM Quizz WHERE secretkey = '$key'");

        While($row = mysqli_fetch_array($query)){
            $title = $row['title'];
        }

        return $title;

    }

    public static function getLink($conn, $key){
        if(Quizz::keyVerify($conn, $key) != true){
            return false;
        }
        $query = mysqli_query($conn, "SELECT id FROM Quizz WHERE secretkey = '$key'");

        While($row = mysqli_fetch_array($query)){
            $id = $row['id'];
        }
        $result = "/index.php?page=quizz&id=".$id;

        return $result;

    }

    public static function getId($conn, $key){
        if(Quizz::keyVerify($conn, $key) != true){
            return false;
        }
        $query = mysqli_query($conn, "SELECT id FROM Quizz WHERE secretkey = '$key'");

        While($row = mysqli_fetch_array($query)){
            $id = $row['id'];
        }

        return $id;
    }

    public static function getQuestions($conn, $key){
        if(Quizz::keyVerify($conn, $key) != true){
            return false;
        }

        $id = Quizz::getId($conn, $key);
        $query = mysqli_query($conn, "SELECT * FROM questions WHERE quizz_id = '$id'");

        $count = 1;
        while($row = mysqli_fetch_array($query)){
            ?>
            <div class="question-box">
                <div class="question w-100">
                    <?=$row['question'];?>
                    <button type="button" class="btn-clear float-right" data-toggle="collapse" data-target="#question<?=$count?>"><i class="fas fa-arrow-circle-down"></i></button>
                    <div class="float-none"></div>
                </div>

                <div id="question<?=$count?>" class="collapse question-collapse">
                    Odp 1: <?=$row['answer1'];?><br />
                    Odp 2: <?=$row['answer2'];?><br />
                    Odp 3: <?=$row['answer3'];?><br />
                    Odp 4: <?=$row['answer4'];?><br />
                    Nr. poprawnej odpowiedzi: <?=$row['correct_answer'];?>
                </div>

            </div>

            <?php

            $count++;
        }

    }

    public static function addQuestion($conn, $key, $question, $answer1, $answer2, $answer3, $answer4, $correctAnswer){
        if(Quizz::keyVerify($conn, $key) != true){
            return false;
        }
        $id = Quizz::getId($conn, $key);
        mysqli_query($conn,"INSERT INTO questions VALUES (NULL, '$id', '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correctAnswer')");
    }

    public static function getNumUserQuestions($conn){
        $user = $_SESSION['user'];
        $query = mysqli_query($conn,"SELECT * FROM quizz WHERE author = '$user'");
        return mysqli_num_rows($query);
    }

    public static function getUserQuestions($conn){
        $user = $_SESSION['user'];
        $query = mysqli_query($conn,"SELECT * FROM quizz WHERE author = '$user'");

        While($row = mysqli_fetch_array($query)){
            ?>
            <div class="box">
                <span><?=$row['title']?></span><a href="?page=createQuizz&key=<?=$row['secretkey']?>"><i class="fas fa-arrow-circle-right float-right"></i></a>
            </div>
            <?php
        }

    }

    public static function addScore($conn, $quizzId, $user, $score, $maxScore){
        if(Auth::isLogin() == false){
            return false;
        }
        mysqli_query($conn, "INSERT INTO quizzscore VALUES (NULL, '$user', '$quizzId', '$score', '$maxScore')");
        return true;
    }

    public static function getScore($conn){
        if(Auth::isLogin() == false){
            return false;
        }
        $user = $_SESSION['user'];

        $query = mysqli_query($conn, "SELECT * FROM quizzscore WHERE user='$user'");

        while($row = mysqli_fetch_array($query)){
            $quizzId = $row['quizz_id'];
            $score = $row['score'];
            $maxScore = $row['maxScore'];
            $query2 = mysqli_query($conn, "SELECT title FROM quizz WHERE id='$quizzId'");
            while($row2 = mysqli_fetch_array($query2)){
                $title = $row2['title'];
            }
            ?>
            <div class="box">
                <span><?=$title?> </span><b class="float-right"><?=$score?>/<?=$maxScore?></b>
            </div>
            <?php

        }
    }

    public static function getUserDoneQuizz($conn){
        if(Auth::isLogin() == false){
            return false;
        }

        $user = $_SESSION['user'];
        $query = mysqli_query($conn, "SELECT * FROM quizzscore WHERE user='$user'");
        $result = mysqli_num_rows($query);

        return $result;
    }


}