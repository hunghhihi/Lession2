<?php
class User extends Database
{
    public function checkUser($email, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->select($sql);
        return $result;
    }
    public function getAllUser()
    {
        $sql = "SELECT * FROM users";
        $result = $this->select($sql);
        return $result;
    }
    public function paginate($page, $limit)
    {
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM users LIMIT $start, $limit";
        $result = $this->select($sql);
        return $result;
    }
    public function getPage($limit)
    {
        $sql = "SELECT * FROM users";
        $result = $this->select($sql);
        $total = count($result);
        $page = ceil($total / $limit);
        return $page;
    }
    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->select($sql);
        return $result;
    }
    public function edit($id, $name, $password)
    {
        $password = md5($password);
        $sql = "UPDATE users SET username = '$name', password = '$password' WHERE id = '$id'";
        $result = $this->update($sql);
        return $result;
    }

    public function register($name, $email, $password)
    {
        $password =  md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->select($sql);
        if ($result) {
            return false;
        } else {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
            $result = $this->insert($sql);
            if ($result) {
                $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = $this->select($sql);
                return $result;
            }
        }
    }
}
