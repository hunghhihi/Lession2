<?php
class Register extends Controller
{
    public function index()
    {
        $error = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirmPassword'];
            $user = $this->model("User");
            if (is_null($name) || $name == '' || is_null($email) || $email == '' || is_null($password) || $password == '' || is_null($confirm_password) || $confirm_password == '') {
                $error = "All fields are required";
            } else {
                if ($name != 'admin') {
                    if ($password == $confirm_password) {
                        $result = $user->register($name, $email, $password);
                        if ($result) {
                            $_SESSION['user'] = $result[0];
                            $_SESSION['role'] = 'user';
                            header("Location: /home");
                        } else {
                            $error = 'Email already exists';
                        }
                    } else {
                        $error = 'Password and confirm password not match';
                    }
                } else {
                    $error = 'Username is not available';
                }
            }
        }
        return $this->view("register", ['error' => $error]);
    }
}
