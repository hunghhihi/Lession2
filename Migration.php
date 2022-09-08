<?php
require_once './app/core/Database.php';
$db = new Database();
//remove the table if it exists
$db->conn->query("DROP TABLE IF EXISTS `users`");
$db->conn->query("CREATE TABLE IF NOT EXISTS users(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        role VARCHAR(255) NOT NULL default 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
// insert user
$db->conn->query("INSERT INTO users(username, password, email, role) VALUES('admin', md5('admin'), 'admin@admin.com', 'admin')");
$db->conn->query("INSERT INTO users(username, password, email) VALUES('hung',md5('123456'), 'hung@hung.com')");
