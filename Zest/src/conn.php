<?php
try {
    $conn = @mysqli_connect('remotemysql.com', '2DnxO0iukq', 'DtnEbbqlu0', '2DnxO0iukq', 3306);

    if (empty($conn)) {
        throw new RuntimeException();
    }
} catch (\Throwable $th) { 
    include("error.php");
    exit();
}
?>