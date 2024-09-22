<!DOCTYPE html>
<html lang="en">

<head>
   <title>Floppy PEP</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="description" content="Play Floppy PEP, remake of popular game Flappy Bird built in html, css and js" />
   <meta name="keywords"
      content="flappybird,flappy,bird,floppybird,floppy,html,html5,css,css3,js,javascript,jquery,github,pepecoin,pepe,pep,floppy pep" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

   <meta property="og:title" content="Floppy PEP" />
   <meta property="og:description"
      content="Play Floppy PEP, remake of popular game Flappy Bird built in html, css and js" />
   <meta property="og:type" content="website" />
   <meta property="og:url" content="https://pepelum.site/floppypep/" />
   <meta property="og:site_name" content="FloppyPep" />

   <?php if (!isset($_GET['p']) || $_GET['p'] == 'game'): ?>
      <link href="css/reset.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
   <?php endif; ?>
</head>

<body>

   <?php
   if (!isset($_GET['p']) || $_GET['p'] == 'game') {
      include 'include/game.php';
   } else {
      include 'include/404.php';
   }
   ?>

   <?php include 'include/menu.php'; ?>
   <?php include 'include/rewards.php'; ?>

   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.transit.min.js"></script>
   <script src="js/buzz.min.js"></script>
   <script src="js/main.js"></script>
   <script>
      window.addEventListener("orientationchange", function () {
         location.reload();
      });
   </script>

   <script>
      (function () {
         document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            setTimeout(function () {
               var payoutContent = document.getElementById('payout').textContent;
               console.log('Payout Content:', payoutContent);
               document.getElementById('payoutValue').value = payoutContent;
               event.target.submit();
            }, 5000);
         });
      })();
   </script>

   <script>
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
   </script>

</body>

</html>