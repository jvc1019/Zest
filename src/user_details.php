<?php
session_start();

// Stores the user_Name and user_ID
if (!isset($_SESSION['user_Name'])) {
    header("Location: landing.php");
} else if (isset($_SESSION['user_Name'])) {
    $user_Name = $_SESSION['user_Name']; /* you can also access $user_Name on your php as long as you 
											include header.php*/
    $user = $conn->query("SELECT * FROM user WHERE user_Name='$user_Name'")->fetch_assoc();
    $user_ID = $user['user_ID']; /* you can also access $user_ID on your php as long as you 
										include header.php*/
    $user_Email = $user['user_Email'];
    $user_Desc = $user['user_Desc'];
    $user_Theme = $user['user_Theme'];

    // Custom CSS user theme overriding the default ones.
    if (file_exists("css/" . $user_Theme)) {
        echo "<link href='$user_Theme.css' rel='stylesheet'>";
    }
}
