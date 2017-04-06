<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

class Authoris_sess {
    private $_lg = "user";
    private $_pass = "php";

    public function maybe() {
        if (isset($_SESSION["authoris"])) {
            return $_SESSION["authoris"];
        }
        else return false;
        }

    public function auth($lg, $pass) {
        if ($lg == $this->_lg && $pass == $this->_pass) {
            $_SESSION["authoris"] = true;
            $_SESSION["l"] = $lg;
            return true;
        }
        else {
            $_SESSION["authoris"] = false;
            return false;
        }
    }


    public function give_login() {
        if ($this->maybe()) {
            return $_SESSION["l"];
        }
    }


    public function vihod() {
        $_SESSION = array();
        session_destroy();
    }
}

$auth = new Authoris_sess();

if (isset($_POST["l"]) && isset($_POST["p"])) {
    if (!$auth->auth($_POST["l"], $_POST["p"])) {
        echo "<p style=\"color:red;\">Неправильный пароль или логин!</p>";
    }
}

if (isset($_GET["exit"])) {
    if ($_GET["exit"] == 1) {
        $auth->vihod();
        header("Location: ?exit=0");
    }
}
?>