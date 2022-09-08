<?php
class Home extends Controller
{
    public function index()
    {
        if (isset($_GET['logout'])) {
            require_once './app/controllers/Login.php';
            Login::logout();
        }
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                $conn = $this->model("User");
                $start = $_GET['page'] ?? 1;
                $limit = 2;
                $result = $conn->paginate($start, $limit);
                $page = $conn->getPage($limit);
                return $this->view("admin/dashboard", ['result' => $result, 'page' => $page]);
            } else {
                $conn = $this->model("User");
                $result = $conn->getUser($_SESSION['user']['id']);
                $result = $result[0];
                return $this->view("dashboard", ['result' => $result]);
            }
        } else
            header("Location: /login");
    }
    public function edit()
    {
        $error = '';
        $conn = $this->model("User");
        $id = $_GET['id'];
        $result = $conn->getUser($id);
        $result = $result[0];
        if (isset($_POST['submit'])) {
            $name = $_POST['username'];
            if (is_null($name) || $name == '') {
                $error = "Name is required";
            } else {
                $old_password = $_POST['oldPassword'];
                $new_password = $_POST['newPassword'];
                $confirm_password = $_POST['confirmPassword'];
                if ($old_password == $result['password']) {
                    if ($new_password == $confirm_password) {
                        $this->model("User")->edit($result['id'], $name, $new_password);
                        $_SESSION['user'] = $conn->getUser($_SESSION['user']['id'])[0];
                        header("Location:/home");
                    } else {
                        $error = 'Password and confirm password not match';
                    }
                } else {
                    $error = 'Old password is incorrect';
                }
            }
        }
        if (isset($_POST['cancel'])) {
            header("Location: /home");
        }
        return $this->view("edit", ['result' => $result, 'error' => $error]);
    }
    public function show()
    {
        $conn = $this->model("User");
        $id = $_GET['id'];
        $result = $conn->getUser($id);
        $result = $result[0];
        if (isset($_POST['cancel'])) {
            header("Location: /home");
        }
        return $this->view("show", ['result' => $result]);
    }
}
