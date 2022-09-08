<?php

class Login extends Controller
{
    private $cookieName = "user";
    private $cookieTime = 3600 * 6;
    public function index()
    {
        $error = '';
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $remember = isset($_POST["rememberMe"]) ? $_POST["rememberMe"] : false;
            $user = $this->model("User");
            $result = $user->checkUser($email, $password);
            if ($result) {
                if ($result[0]['role'] == 'admin') {
                    $_SESSION['user'] = $result[0];
                    $_SESSION['role'] = 'admin';
                    if ($remember == 'check') {
                        setcookie($this->cookieName, 'email=' . $result[0]['email'] . '&password=' . $result[0]['password'], time() + $this->cookieTime, '/');
                    }
                } else {
                    $_SESSION['user'] = $result[0];
                    $_SESSION['role'] = 're$result';
                    if ($remember == 'check') {
                        setcookie($this->cookieName, 'email=' . $result[0]['email'] . '&password=' . $result[0]['password'], time() + $this->cookieTime, '/');
                    }
                }
                header("Location: /home");
            } else {
                $error = "Email or password is incorrect";
                return $this->view("login", ['error' => $error]);
            }
        }
        if (isset($_SESSION['user'])) {
            $this->checkCookie();
        } else
            return $this->view("login", ['error' => $error]);
    }
    public function checkCookie()
    {
        if (isset($this->cookieName)) {
            if (isset($_COOKIE[$this->cookieName])) {
                parse_str($_COOKIE[$this->cookieName], $cookie);
                $result = $this->model("User")->checkUser($cookie['email'], $cookie['password']);
                if ($result) {
                    if ($result[0]['role'] == 'admin') {
                        $_SESSION['user'] = $result[0];
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['user'] = $result[0];
                        $_SESSION['role'] = 'user';
                    }
                    header("Location: /home");
                }
            } else {
                return require_once "./app/views/login.php";
            }
        }
    }
    public static function logout()
    {
        setcookie('user', '', time() - 3600, '/');
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        header("Location:/");
    }
}
