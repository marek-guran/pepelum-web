<?php
session_start();

function get_server_boot_time()
{
   $uptime = shell_exec('uptime -s');  // Returns boot time in format "YYYY-MM-DD HH:MM:SS"

   if ($uptime === null) {
      return null;  // Handle error
   }

   return strtotime(trim($uptime));  // Convert boot time to timestamp
}

// Get current boot time
get_server_boot_time();
$current_boot_time = get_server_boot_time();

if (!isset($_SESSION['boot_time']) || $_SESSION['boot_time'] != get_server_boot_time()) {
   session_destroy();
   session_start();
   $_SESSION['boot_time'] = get_server_boot_time();
}

// Secret key for HMAC
$dotenv = parse_ini_file(__DIR__ . '/.env');
$secret_key = $dotenv['SECRET_KEY'];

// Ensure start time is only set once
if (!isset($_SESSION['initial_start_time'])) {
   $_SESSION['initial_start_time'] = time();
}

if (!isset($_SESSION['pepe'])) {
   $_SESSION['pepe'] = 0;
}

// Generate the hash and store it on the server (not sent to the client)
$_SESSION['expected_hash'] = hash_hmac('sha256', $_SESSION['pepe'] . $_SESSION['initial_start_time'], $secret_key);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Floppy PEP</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="description" content="Play Floppy PEP, remake of popular game Flappy Bird." />
   <meta name="keywords"
      content="flappybird,flappy,bird,floppybird,floppy,html,html5,css,css3,js,javascript,jquery,github,pepecoin,pepe,pep,floppy pep" />
   <?php
   $userAgent = $_SERVER['HTTP_USER_AGENT'];
   $isMobile = stripos($userAgent, "iPod") !== false ||
      stripos($userAgent, "iPhone") !== false ||
      stripos($userAgent, "iPad") !== false ||
      stripos($userAgent, "Android") !== false ||
      stripos($userAgent, "webOS") !== false ||
      stripos($userAgent, "BlackBerry") !== false ||
      stripos($userAgent, "Windows Phone") !== false ||
      stripos($userAgent, "Opera Mini") !== false ||
      stripos($userAgent, "IEMobile") !== false;

   if ($isMobile) {
      echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />';
   } else {
      echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
   }
   ?>

   <meta property="og:title" content="Floppy PEP" />
   <meta property="og:description"
      content="Play Floppy PEP, remake of popular game Flappy Bird built in html, css and js" />
   <meta property="og:type" content="website" />
   <meta property="og:url" content="https://pepelum.site/floppypep/" />
   <meta property="og:site_name" content="FloppyPep" />
   <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="css/reset.css" rel="stylesheet">
   <link href="css/main.css" rel="stylesheet">
   <?php
   if (!isset($_GET['p']) || $_GET['p'] == 'game') {
      echo '<link rel="stylesheet" type="text/css" href="css/game.css">';
   }
   ?>
</head>

<body>
   <?php
   // Check if the 'p' parameter is set
   if (isset($_GET['p'])) {
      // Parse the 'p' parameter to extract the main page identifier and additional parameters
      $p = $_GET['p'];
      $parts = explode('=', $p, 2);
      $page = $parts[0];
      $additionalParams = isset($parts[1]) ? $parts[1] : '';

      // Include the appropriate file based on the main page identifier
      if ($page == 'game') {
         include 'include/game.php';
      } elseif ($page == 'payout') {
         include 'include/payout.php';
      } else {
         include 'include/404.php';
      }
   } else {
      // Default to 'game' if 'p' parameter is not set
      include 'include/game.php';
   }
   ?>

   <?php
   if (!isset($_GET['p']) || strpos($_GET['p'], 'payout') !== 0) {
      include 'include/menu.php';
   }
   ?>

   <?php
   // Conditionally include rewards.php if the main page identifier is not 'payout'
   if (!isset($page) || $page != 'payout') {
      include 'include/rewards.php';
   }
   ?>

   <?php
   if (!preg_match('/\.\.\/p=rewards.*/', $_SERVER['REQUEST_URI'])) {
      echo '<script src="https://challenges.cloudflare.com/turnstile/v0/api.js"></script>';
      echo '<script src="js/jquery.min.js"></script>';
      echo '<script src="js/jquery.transit.min.js"></script>';
      echo '<script src="js/buzz.min.js"></script>';
      echo '<script src="js/main.js"></script>';
   }
   ?>
   <?php include 'include/forms.php'; ?>

   <script>
      window.addEventListener("orientationchange", function () {
         location.reload();
      });
   </script>
</body>

</html>