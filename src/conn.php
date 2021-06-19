<?php
$conn = new mysqli('remotemysql.com', '2DnxO0iukq', 'DtnEbbqlu0', '2DnxO0iukq', 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
