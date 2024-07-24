<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepelum</title>
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">

    <link rel="icon" type="image/png" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>

    <?php
            $uri = $_SERVER['REQUEST_URI'];
            if ($uri == '/' || $uri == '/index.php?p=home' || $uri == '/?p=home') {
                include 'src/home.php';
            } elseif ($uri == '/index.php?p=wallets' || $uri == '/?p=wallets') {
                include 'src/wallets.php';
            } elseif ($uri == '/index.php?p=mining' || $uri == '/?p=mining') {
                include 'src/mining.php';
            } elseif ($uri == '/index.php?p=getpepecoin' || $uri == '/?p=getpepecoin') {
                include 'src/getpepecoin.php';
            } elseif ($uri == '/index.php?p=bots' || $uri == '/?p=bots') {
                include 'src/bots.php';
            } elseif ($uri == '/index.php?p=roadmap' || $uri == '/?p=roadmap') {
                include 'src/roadmap.php';
            } elseif ($uri == '/index.php?p=history' || $uri == '/?p=history') {
                include 'src/history.php';
            } elseif ($uri == '/index.php?p=about' || $uri == '/?p=about') {
                include 'src/about.php';
            }
        ?>

    <script src="libs/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>