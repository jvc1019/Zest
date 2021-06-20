<?php
try {
    $conn = @mysqli_connect('remotemysql.com', '2DnxO0iukq', 'DtnEbbqlu0', '2DnxO0iukq', 3306);

    if (empty($conn)) {
        throw new RuntimeException();
    }
} catch (\Throwable $th) { ?>
    <div class="error">
        <h1>You are offline.</h1>
        <p>Please connect to the internet to continue.</p>
    </div>
<?php
    exit();
}
?>