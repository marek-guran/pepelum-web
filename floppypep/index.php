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
   <meta property="og:url" content="https://floppypep.pepelum.site/" />
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
</body>

</html>