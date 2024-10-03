<?php
session_start();

// Secret key for HMAC
$secret_key = '';

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
   <meta name="description" content="Play Floppy PEP, remake of popular game Flappy Bird built in html, css and js" />
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

   <script src="https://challenges.cloudflare.com/turnstile/v0/api.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.transit.min.js"></script>
   <script src="js/buzz.min.js"></script>
   <script src="js/main.js"></script>
   <script>
      window.addEventListener("orientationchange", function () {
         location.reload();
      });
      (function () {
         document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            var walletAddress = document.getElementById('wallet').value;
            var errorAddr = document.getElementById('error-address');
            var errorBal = document.getElementById('error-balance');

            fetch('include/get_balance.php')
               .then(response => response.json())
               .then(data => {
                  var currentPepeBalance = Number(data.currentPepeBalance);

                  if (!walletAddress.startsWith('P')) {
                     errorBal.style.display = 'none';
                     errorAddr.textContent = 'Wrong address format. Wallet address must start with a capital letter "P".';
                     errorAddr.style.display = 'block';
                     return;
                  } else if (currentPepeBalance < 1) {
                     errorAddr.style.display = 'none';
                     errorBal.textContent = 'You can\'t withdraw nothing!';
                     errorBal.style.display = 'block';
                     return;
                  } else {
                     errorBal.style.display = 'none';
                     errorAddr.style.display = 'none';
                     var payoutContent = document.getElementById('payout').textContent;
                     event.target.submit();
                  }
               })
               .catch(error => {
                  console.error('Error fetching balance:', error);
               });
         });
      })();

      document.getElementById('donationAddress').addEventListener('click', function () {
         // Create a temporary input element
         var tempInput = document.createElement('input');
         tempInput.value = 'PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ';
         document.body.appendChild(tempInput);

         // Select the text in the input element
         tempInput.select();
         tempInput.setSelectionRange(0, 99999); // For mobile devices

         // Copy the text to the clipboard
         document.execCommand('copy');

         // Remove the temporary input element
         document.body.removeChild(tempInput);

         // Optionally, display a message to the user
         alert('Donation address copied to clipboard!');
      });
      document.getElementById('devAddress').addEventListener('click', function () {
         // Create a temporary input element
         var devInput = document.createElement('input');
         devInput.value = 'PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K';
         document.body.appendChild(devInput);

         // Select the text in the input element
         devInput.select();
         devInput.setSelectionRange(0, 99999); // For mobile devices

         // Copy the text to the clipboard
         document.execCommand('copy');

         // Remove the temporary input element
         document.body.removeChild(devInput);

         // Optionally, display a message to the user
         alert('Developer address copied to clipboard!');
      });

      // Get the server time for 1:00 am in UTC
      var serverTime = new Date('<?php echo date('Y-m-d H:i:s', strtotime('01:00:00 UTC')); ?>');

      // Get the user's time zone offset in milliseconds
      var userTimezoneOffset = new Date().getTimezoneOffset() * 60000; // Convert minutes to milliseconds

      // Calculate the user's local time by adding the timezone offset
      var localTime = new Date(serverTime.getTime() - userTimezoneOffset);

      // Format the local time to display in the desired format
      var options = { hour: '2-digit', minute: '2-digit', hour12: true };
      var formattedLocalTime = localTime.toLocaleTimeString([], options);

      // Update the paragraph with the local time
      document.getElementById('claim-time').innerHTML = 'Server reboots at ' + formattedLocalTime + '! This means that you will lose your ⱣEPE balance';

      document.getElementById('payout-form').addEventListener('submit', function (event) {
         var walletAddress = document.getElementById('wallet').value;
         if (!walletAddress.startsWith('P')) {
            event.preventDefault(); // Prevent form submission
            document.getElementById('error-message').style.display = 'block'; // Show error message
         } else {
            document.getElementById('error-message').style.display = 'none'; // Hide error message
         }
      });
   </script>
</body>

</html>