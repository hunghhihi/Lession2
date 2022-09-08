<?php
class Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "test");
        $this->conn->set_charset("utf8");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function select($sql)
    {
        $result = $this->conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function insert($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
    public function update($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
    public function delete($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
}
