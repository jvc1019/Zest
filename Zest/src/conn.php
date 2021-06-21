<?php
try {
    $conn = @mysqli_connect('remotemysql.com', '2DnxO0iukq', 'DtnEbbqlu0', '2DnxO0iukq', 3306);

    if (empty($conn)) {
        throw new RuntimeException();
    }
} catch (\Throwable $th) { ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/error.css" />
        <!-- Google font -->
        <style id="" media="all">
            @font-face {
            font-family: 'Nunito';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIOOaBXso.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
        </style>
    </head>

    <body>
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-content"></div>
                <img class= "small-icon" src="../resources/icons/sad-icon.png"/>
                <br>
                <h2>Oops! You are offline</h2>
                <p>This page can not be displayed at the moment. Try once again later when your device connects to a network.</p>
                <a href=".">Try Again</a>
            </div>
        </div>
    </body>
    </html>

<?php
    exit();
}
?>