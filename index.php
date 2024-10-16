<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepelum - Comprehensive Guide to Pepecoin (PEP): Buy, Store, Sell, and More</title>
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">

    <link rel="icon" type="image/png" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/main.css">

    <meta name="theme-color" content="#212121" />
    <link rel="manifest" href="manifest.json">

    <!-- Primary Meta Tags -->
    <meta name="description"
        content="Pepelum is your one-stop resource for everything Pepecoin (PEP). Discover how to buy, store, and sell Pepecoin securely. Explore our roadmap and leverage our Electrum server for seamless transactions.">
    <meta name="keywords"
        content="Pepecoin, PEP, Pepelum, Pepecoin guide, buy Pepecoin, store Pepecoin, sell Pepecoin, Pepecoin roadmap, Electrum server, cryptocurrency, digital currency, blockchain, crypto wallet, Pepecoin tutorial, crypto transactions, Pepecoin resources, Pepecoin investment, Pepecoin security, crypto exchange, Pepecoin price, Pepecoin Electrum, Pepecoin support, Pepecoin wallet">
    <meta name="author" content="Pepelum Team">
    <meta name="robots" content="index, follow">
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="7 days">
    <meta name="subject" content="Pepecoin (PEP) - Cryptocurrency Guides and Resources">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Pepelum - Comprehensive Guide to Pepecoin (PEP): Buy, Store, Sell, and More">
    <meta property="og:description"
        content="Discover how to securely buy, store, and sell Pepecoin with Pepelum's expert guides. Stay informed with our roadmap and utilize our Electrum server for smooth transactions.">
    <meta property="og:image" content="https://pepelum.site/PEPELUM.png">
    <meta property="og:url" content="https://www.pepelum.com">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Pepelum - Comprehensive Guide to Pepecoin (PEP): Buy, Store, Sell, and More">
    <meta name="twitter:description"
        content="Pepelum provides in-depth guides on buying, storing, and selling Pepecoin (PEP). Follow our detailed roadmap and access our Electrum server for seamless transactions.">
    <meta name="twitter:image">


    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js');
        } else {
            console.log("Service worker nie je podporovaný");
        }
    </script>

    <style>
        .close-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8f9fa;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 32px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .close-btn:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>

    <?php
    $uri = $_SERVER['REQUEST_URI'];
    $showCloseBtn = $uri != '/' && $uri != '/index.php?p=home' && $uri != '/?p=home';

    if ($showCloseBtn) {
        echo '<div class="close-btn" onclick="handleClose()"><i class="fa-solid fa-xmark"></i></div>';
    }

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
    } elseif ($uri == '/index.php?p=electrumX' || $uri == '/?p=electrumX') {
        include 'src/electrumX.php';
    }
    ?>

    <script src="libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        function handleClose() {
            window.location.href = '/';
        }
    </script>
</body>

</html>