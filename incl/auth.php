<?php
class Auth{
    public static function Register($username, $email, $password, $conn, &$err_message) : bool{
        if(strlen($username) > USER_USERNAME_MAX_LEN) {
            $err_message = "Maksymalna długość nazwy urzytkownika wynosi".USER_USERNAME_MAX_LEN;
            return false;
        }


        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        $num_rows = mysqli_num_rows($query);

        if($num_rows != 0){
            $err_message = "Nazwa użytkownika lub email jest zajęty";
            return false;
        }

        $password_hash = password_hash($password, PASSWORD_HASH_ALGO);

        mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$username', '$email', '$password_hash', '0', '0')");
        return true;
    }

    public static function Login( $usernameOrEmail, $password, $conn, &$err_message) : bool {

        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'");
        while($row = mysqli_fetch_array($query)) {
            $password_hash = $row['password_hash'];
            $username = $row['username'];
        }
        $numRow = mysqli_num_rows($query);

        if($numRow == 0) {
            $err_message = "Niepoprawny login";
            return false;
        }

        if(!password_verify($password, $password_hash)) {
            $err_message = "niepoprawne hasło";
            return false;
        }

        $_SESSION['user'] = $username;

        return true;
    }

    public static function isLogin() : bool{
        if(!isSet($_SESSION['user']) || $_SESSION['user'] == Null){
            return false;
        }
        return true;
    }

    public static function logout() : bool{
        if(!isSet($_SESSION['user'])){
            return false;
        }
        unset($_SESSION['user']);
        return true;
    }

    public static function getUserEmail($user, $conn){
        $query = mysqli_query($conn,"SELECT email FROM users WHERE username='$user'");
        while($row = mysqli_fetch_array($query)){
            $email = $row['email'];
        }
        return $email;
    }

}
