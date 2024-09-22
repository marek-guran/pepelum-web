(function () {
   var debugmode = false;

   var states = Object.freeze({
      SplashScreen: 0,
      GameScreen: 1,
      ScoreScreen: 2
   });

   updatePepe(score);

   var currentstate;
   var rewardThreshold = 100;

   var gravity = 0.25;
   var velocity = 0;
   var position = 180;
   var rotation = 0;
   var jump = -4.6;
   var flyArea = $("#flyarea").height();

   var score = 0;
   var highscore = 0;
   var pepe = 0;

   var pipeheight = 140;
   var pipewidth = 52;
   var pipes = new Array();

   var replayclickable = false;

   var volume = 30;
   //sounds
   var urlParams = new URLSearchParams(window.location.search);
   var isRewardsPage = urlParams.get('p') === 'rewards';
   if (isRewardsPage) {
      volume = 0;
   }
   var soundJump = new buzz.sound("assets/sounds/sfx_wing.ogg");
   var soundScore = new buzz.sound("assets/sounds/sfx_point.ogg");
   var soundHit = new buzz.sound("assets/sounds/sfx_hit.ogg");
   var soundDie = new buzz.sound("assets/sounds/sfx_die.ogg");
   var soundSwoosh = new buzz.sound("assets/sounds/sfx_swooshing.ogg");
   buzz.all().setVolume(volume);

   //loops
   var loopGameloop;
   var loopPipeloop;

   $(document).ready(function () {
      //get the highscore
      var savedscore = getCookie("highscore");
      if (savedscore != "")
         highscore = parseInt(savedscore);

      //start with the splash screen
      showSplash();
   });

   function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
         var c = ca[i].trim();
         if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
      }
      return "";
   }

   function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + "; " + expires;
   }

   function showSplash() {
      currentstate = states.SplashScreen;

      //set the defaults (again)
      velocity = 0;
      position = 180;
      rotation = 0;
      score = 0;

      //update the player in preparation for the next game
      $("#player").css({ y: 0, x: 0 });
      updatePlayer($("#player"));

      soundSwoosh.stop();
      soundSwoosh.play();

      //clear out all the pipes if there are any
      $(".pipe").remove();
      pipes = new Array();

      //make everything animated again
      $(".animated").css('animation-play-state', 'running');
      $(".animated").css('-webkit-animation-play-state', 'running');

      //fade in the splash
      $("#splash").transition({ opacity: 1 }, 2000, 'ease');
   }

   function startGame() {
      currentstate = states.GameScreen;

      //fade out the splash
      $("#splash").stop();
      $("#splash").transition({ opacity: 0 }, 500, 'ease');

      //update the big score
      setBigScore();

      //debug mode?
      if (debugmode) {
         //show the bounding boxes
         $(".boundingbox").show();
      }

      // Only start the game loop if it's not the rewards page
      if (!isRewardsPage) {
         //start up our loops
         var updaterate = 1000.0 / 60.0; //60 times a second
         loopGameloop = setInterval(gameloop, updaterate);
         loopPipeloop = setInterval(updatePipes, 1400);

         //jump from the start!
         playerJump();
      }
   }

   function updatePlayer(player) {
      //rotation
      rotation = Math.min((velocity / 10) * 90, 90);

      //apply rotation and position
      $(player).css({ rotate: rotation, top: position });
   }

   function gameloop() {
      var player = $("#player");

      // Update the player speed/position
      velocity += gravity;
      position += velocity;

      // Update the player
      updatePlayer(player);

      // Create the bounding box
      var box = document.getElementById('player').getBoundingClientRect();
      var origwidth = 34.0;
      var origheight = 24.0;

      var boxwidth = origwidth - (Math.sin(Math.abs(rotation) / 90) * 8);
      var boxheight = (origheight + box.height) / 2;
      var boxleft = ((box.width - boxwidth) / 2) + box.left;
      var boxtop = ((box.height - boxheight) / 2) + box.top;
      var boxright = boxleft + boxwidth;
      var boxbottom = boxtop + boxheight;

      // If we're in debug mode, draw the bounding box
      if (debugmode) {
         var boundingbox = $("#playerbox");
         boundingbox.css('left', boxleft);
         boundingbox.css('top', boxtop);
         boundingbox.css('height', boxheight);
         boundingbox.css('width', boxwidth);
      }

      // Did we hit the ground?
      if (box.bottom >= $("#land").offset().top) {
         playerDead();
         return;
      }

      // Have they tried to escape through the ceiling?
      var ceiling = $("#ceiling");
      if (boxtop <= (ceiling.offset().top + ceiling.height())) {
         position = 0;
      }

      // We can't go any further without a pipe
      if (pipes[0] == null) {
         return;
      }

      // Determine the bounding box of the next pipe's inner area
      var nextpipe = pipes[0];
      var nextpipeupper = nextpipe.children(".pipe_upper");

      var pipetop = nextpipeupper.offset().top + nextpipeupper.height();
      var pipeleft = nextpipeupper.offset().left - 2; // For some reason it starts at the inner pipe's offset, not the outer pipe's.
      var piperight = pipeleft + pipewidth;
      var pipebottom = pipetop + pipeheight;

      if (debugmode) {
         var boundingbox = $("#pipebox");
         boundingbox.css('left', pipeleft);
         boundingbox.css('top', pipetop);
         boundingbox.css('height', pipeheight);
         boundingbox.css('width', pipewidth);
      }

      // Have we gotten inside the pipe yet?
      if (boxright > pipeleft) {
         // We're within the pipe, have we passed between upper and lower pipes?
         if (boxtop > pipetop && boxbottom < pipebottom) {
            // Yeah! We're within bounds
         } else {
            // No! We touched the pipe
            playerDead();
            return;
         }
      }

      // Have we passed the imminent danger?
      if (boxleft > piperight) {
         // Yes, remove it
         pipes.splice(0, 1);

         // And score a point
         playerScore();
      }
   }

   //Handle space bar
   $(document).keydown(function (e) {
      //space bar!
      if (e.keyCode == 32) {
         //in ScoreScreen, hitting space should click the "replay" button. else it's just a regular spacebar hit
         if (currentstate == states.ScoreScreen)
            $("#replay").click();
         else
            screenClick();
      }
   });

   //Handle mouse down OR touch start
   if ("ontouchstart" in window)
      $(document).on("touchstart", screenClick);
   else
      $(document).on("mousedown", screenClick);

   function screenClick() {
      if (currentstate == states.GameScreen) {
         playerJump();
      } else if (currentstate == states.SplashScreen) {
         startGame();
      }
   }

   function playerJump() {
      velocity = jump;
      //play jump sound
      soundJump.stop();
      soundJump.play();
   }

   function setBigScore(erase) {
      var elemscore = $("#bigscore");
      elemscore.empty();

      if (erase)
         return;

      var digits = score.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append("<img src='assets/font_big_" + digits[i] + ".png' alt='" + digits[i] + "'>");
   }

   function setSmallScore() {
      var elemscore = $("#currentscore");
      elemscore.empty();

      var digits = score.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append("<img src='assets/font_small_" + digits[i] + ".png' alt='" + digits[i] + "'>");
   }

   function setHighScore() {
      var elemscore = $("#highscore");
      elemscore.empty();

      var digits = highscore.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append("<img src='assets/font_small_" + digits[i] + ".png' alt='" + digits[i] + "'>");
   }

   function setPepeScore() {
      pepe = Math.floor(score / rewardThreshold);
      var elemscore = $("#pepe");
      elemscore.empty();

      var digits = pepe.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append("<img src='assets/font_small_" + digits[i] + ".png' alt='" + digits[i] + "' style='width: 20px;'>");
   }

   function playerDead() {
      //stop animating everything!
      $(".animated").css('animation-play-state', 'paused');
      $(".animated").css('-webkit-animation-play-state', 'paused');

      //drop the bird to the floor
      var playerbottom = $("#player").position().top + $("#player").width(); //we use width because he'll be rotated 90 deg
      var floor = flyArea;
      var movey = Math.max(0, floor - playerbottom);
      $("#player").transition({ y: movey + 'px', rotate: 90 }, 1000, 'easeInOutCubic');

      //it's time to change states. as of now we're considered ScoreScreen to disable left click/flying
      currentstate = states.ScoreScreen;

      //destroy our gameloops
      clearInterval(loopGameloop);
      clearInterval(loopPipeloop);
      loopGameloop = null;
      loopPipeloop = null;

      //mobile browsers don't support buzz bindOnce event
      if (isIncompatible.any()) {
         //skip right to showing score
         showScore();
      } else {
         //play the hit sound (then the dead sound) and then show score
         soundHit.play().bindOnce("ended", function () {
            soundDie.play().bindOnce("ended", function () {
               showScore();
            });
         });
      }
   }

   function showScore() {
      //unhide us
      $("#scoreboard").css("display", "block");

      //remove the big score
      setBigScore(true);

      //have they beaten their high score?
      if (score > highscore) {
         //yeah!
         highscore = score;
         //save it!
         setCookie("highscore", highscore, 999);
      }

      //update the scoreboard
      setSmallScore();
      setHighScore();
      setPepeScore();

      //SWOOSH!
      soundSwoosh.stop();
      soundSwoosh.play();

      //show the scoreboard
      $("#scoreboard").css({ y: '40px', opacity: 0 }); //move it down so we can slide it up
      $("#replay").css({ y: '40px', opacity: 0 });
      $("#scoreboard").transition({ y: '0px', opacity: 1 }, 600, 'ease', function () {
         //When the animation is done, animate in the replay button and SWOOSH!
         soundSwoosh.stop();
         soundSwoosh.play();
         $("#replay").transition({ y: '0px', opacity: 1 }, 600, 'ease');
      });

      //make the replay button clickable
      replayclickable = true;

      // Update pepe on the server
      updatePepe(score);
   }

   $("#replay").click(function () {
      //make sure we can only click once
      if (!replayclickable)
         return;
      else
         replayclickable = false;
      //SWOOSH!
      soundSwoosh.stop();
      soundSwoosh.play();

      //fade out the scoreboard
      $("#scoreboard").transition({ y: '-40px', opacity: 0 }, 1000, 'ease', function () {
         //when that's done, display us back to nothing
         $("#scoreboard").css("display", "none");

         //start the game over!
         showSplash();
      });
   });

   function updatePepe(score) {
      $.ajax({
         url: 'include/update_pepe.php',
         type: 'POST',
         data: { score: score },
         success: function (response) {
            console.log('Pepe updated:', response);
            // Update the element with ID 'payout' with the received amount
            document.getElementById('payout').innerText = `Amount: ${response} Ᵽ`;
         },
         error: function (xhr, status, error) {
            console.error('Error updating pepe:', error);
            document.getElementById('payout').innerText = `Amount: 0 Ᵽ`;
         }
      });
   }

   function playerScore() {
      score += 1;
      //play score sound
      soundScore.stop();
      soundScore.play();
      setBigScore();
   }

   function updatePipes() {
      // Calculate flyArea dynamically
      var flyArea = $("#flyarea").height();

      // Define a larger padding value to ensure a reasonable gap
      var padding = 190; // Increased padding for a larger gap
      var constraint = flyArea - pipeheight - (padding * 2); // Double padding (for top and bottom)

      // Calculate the top pipe height ensuring it respects the padding
      var topheight = Math.floor((Math.random() * constraint) + padding); // Add lower padding

      // Calculate the bottom pipe height ensuring it respects the padding
      var bottomheight = (flyArea - pipeheight) - topheight;

      // Create and append the new pipe with the calculated heights
      var newpipe = $('<div class="pipe animated"><div class="pipe_upper" style="height: ' + topheight + 'px;"></div><div class="pipe_lower" style="height: ' + bottomheight + 'px;"></div></div>');
      $("#flyarea").append(newpipe);
      pipes.push(newpipe);
   }

   var isIncompatible = {
      Android: function () {
         return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function () {
         return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function () {
         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function () {
         return navigator.userAgent.match(/Opera Mini/i);
      },
      Safari: function () {
         return (navigator.userAgent.match(/OS X.*Safari/) && !navigator.userAgent.match(/Chrome/));
      },
      Windows: function () {
         return navigator.userAgent.match(/IEMobile/i);
      },
      any: function () {
         return (isIncompatible.Android() || isIncompatible.BlackBerry() || isIncompatible.iOS() || isIncompatible.Opera() || isIncompatible.Safari() || isIncompatible.Windows());
      }
   };
})();