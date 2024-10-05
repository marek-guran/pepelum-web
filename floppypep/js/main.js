(function () {
   var states = Object.freeze({
      SplashScreen: 0,
      GameScreen: 1,
      ScoreScreen: 2
   });

   updatepepe(score);

   var currentstate;
   var rewardThreshold = 10;

   // Initial gravity and jump values for 1920x1080 resolution
   var baseGravity = 0.25;
   var baseJump = -4.6;

   // Function to calculate gravity based on screen height
   function calculateGravity() {
      var screenHeight = window.innerHeight;
      if (screenHeight <= 1080) {
         return baseGravity;
      } else {
         // Increase gravity gradually for higher resolutions
         var extraHeight = screenHeight - 1080;
         var gravityIncrease = extraHeight * 0.0003; // Adjust this factor as needed
         return baseGravity + gravityIncrease;
      }
   }

   // Function to calculate jump based on screen height
   function calculateJump() {
      var screenHeight = window.innerHeight;
      if (screenHeight <= 1080) {
         return baseJump;
      } else {
         // Decrease jump magnitude gradually for higher resolutions
         var extraHeight = screenHeight - 1080;
         var jumpDecrease = extraHeight * 0.006; // Adjust this factor as needed
         return baseJump - jumpDecrease;
      }
   }

   // Set the gravity and jump values
   var gravity = calculateGravity();
   var jump = calculateJump();

   // Recalculate gravity and jump when the window is resized
   window.addEventListener('resize', function () {
      gravity = calculateGravity();
      jump = calculateJump();
   });
   var velocity = 0;
   var position = 180;
   var rotation = 0;
   var flyArea = $("#flyarea").height();

   var score = 0;
   var highscore = 0;
   var pepe = 0;

   // Get the screen height and width
   var screenHeight = window.innerHeight;
   var pipeheight = screenHeight * 0.2;
   var padding = pipeheight * 1.2;
   var pipewidth;

   var pipewidth;
   if (window.innerWidth <= 1080) {
      pipewidth = 52;
   } else {
      pipewidth = Math.min(52 * (window.innerWidth / 1080), 1000); // Set 100 as the maximum limit
   }

   // Set CSS variables dynamically
   document.documentElement.style.setProperty('--pipe-height', `${pipewidth / 2}px`);
   document.documentElement.style.setProperty('--pipe-width', `${pipewidth}px`);

   var pipeSpeed = 7500;
   var pipes = new Array();

   var replayclickable = false;

   var volume = 30;

   document.addEventListener('DOMContentLoaded', function () {
      // Get the volume slider and value display elements
      var volumeSlider = document.getElementById('volume');
      var volumeValue = document.getElementById('volume-value');

      // Function to get a cookie by name
      function getCookie(name) {
         var value = "; " + document.cookie;
         var parts = value.split("; " + name + "=");
         if (parts.length == 2) return parts.pop().split(";").shift();
      }

      // Function to set a cookie
      function setCookie(name, value, days) {
         var expires = "";
         if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
         }
         document.cookie = name + "=" + (value || "") + expires + "; path=/";
      }

      // Load the saved volume from cookies
      var savedVolume = getCookie('volume');
      if (savedVolume !== undefined) {
         volume = parseInt(savedVolume, 10); // Convert the saved volume to a number
         volumeSlider.value = volume;
         volumeValue.textContent = volume;
         buzz.all().setVolume(volume); // Update the volume for all buzz sounds
      }

      // Update the volume value display and save to cookies on input change
      volumeSlider.addEventListener('input', function () {
         volume = volumeSlider.value;
         volumeValue.textContent = volume;
         setCookie('volume', volume, 365); // Save the volume in cookies for 1 year
         buzz.all().setVolume(volume); // Update the volume for all buzz sounds
      });
   });
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
   var theme1 = new buzz.sound("assets/sounds/air-castle-ra.mp3");
   var theme2 = new buzz.sound("assets/sounds/space-journey-hartzmann.mp3");
   var theme3 = new buzz.sound("assets/sounds/stardust-danijel-zambo.mp3");
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

      $("#splash").stop();
      $("#splash").transition({ opacity: 0 }, 500, 'ease');

      let themes = [theme1, theme2, theme3];
      let lastPlayedIndex = -1;

      function shuffle(array) {
         for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
         }
      }

      function playNextTheme() {
         if (lastPlayedIndex !== -1) {
            themes[lastPlayedIndex].stop();
         }
         let availableThemes = themes.filter((_, index) => index !== lastPlayedIndex);
         shuffle(availableThemes);
         let nextTheme = availableThemes[0];
         lastPlayedIndex = themes.indexOf(nextTheme);
         nextTheme.play();
         nextTheme.bind("ended", playNextTheme);
      }

      // Start playing the first theme
      playNextTheme();

      setBigScore();

      if (!isRewardsPage) {
         var baseUpdaterate = 1000.0 / 60.0; // Base 60 FPS

         function calculateUpdaterate() {
            var screenWidth = window.innerWidth;
            if (screenWidth <= 1920) {
               return baseUpdaterate;
            } else {
               // A much smaller and more manageable factor
               var extraWidth = screenWidth - 1920;
               var updaterateDecrease = extraWidth / 1000; // Adjust factor to match your needs
               return Math.max(baseUpdaterate - updaterateDecrease, 1000 / 240); // Min updaterate (120 FPS cap)
            }
         }


         var updaterate = calculateUpdaterate();

         function updateGame() {
            setTimeout(updateGame, updaterate);
         }

         updateGame();

         window.addEventListener('resize', function () {
            updaterate = calculateUpdaterate();
         });
         loopGameloop = setInterval(gameloop, updaterate);

         function calculatePipeInterval() {
            var screenWidth = window.innerWidth;
            if (screenWidth >= 4000) {
               var baseInterval = 250;
               var additionalInterval = Math.floor((screenWidth - 1800) / 1000) / 10;
               return 1400;
            } else if (screenWidth > 1080) {
               var baseInterval = 1000;
               return 1400;
            } else {
               return 1400;
            }
         }

         var pipeInterval = calculatePipeInterval();

         window.addEventListener('resize', function () {
            pipeInterval = calculatePipeInterval();
            clearInterval(loopPipeloop);
            loopPipeloop = setInterval(updatePipes, pipeInterval);
         });

         if (window.innerWidth > 1080) {
            // First pipe delay 1 second
            setTimeout(function () {
               updatePipes();
               loopPipeloop = setInterval(updatePipes, pipeInterval);
            }, 1000);
         } else {
            updatePipes();
            loopPipeloop = setInterval(updatePipes, pipeInterval);
         }
         playerJump();
      }
   }

   function updatePlayer(player) {
      //rotation
      rotation = Math.min(Math.max((velocity / 10) * 90, -40), 90);

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
      var origwidth = 49.0;
      var origheight = 52.0;

      // Function to update pepe size based on screen resolution
      function updatepepeSize() {
         var screenWidth = window.innerWidth * 0.9;
         var screenHeight = window.innerHeight * 0.9;

         // Calculate new dimensions based on the screen resolution
         var aspectRatio = origwidth / origheight;
         var newHeight = (origheight / 1080) * screenHeight;
         var newWidth = newHeight * aspectRatio;

         // Ensure minimum size for visibility on small screens
         var minWidth = screenWidth * 0.01; // 10% of screen width
         var minHeight = minWidth / aspectRatio; // Maintain aspect ratio

         newWidth = Math.max(newWidth, minWidth);
         newHeight = Math.max(newHeight, minHeight);

         // Update the pepe's CSS properties
         var pepeElement = document.querySelector('.pepe');
         pepeElement.style.width = newWidth + 'px';
         pepeElement.style.height = newHeight + 'px';
      }

      // Call the function to set the initial size
      updatepepeSize();

      // Add an event listener to update the size on window resize
      window.addEventListener('resize', updatepepeSize);

      var boxwidth = origwidth - (Math.sin(Math.abs(rotation) / 90) * 8);
      var boxheight = (origheight + box.height) / 2;
      var boxleft = ((box.width - boxwidth) / 2) + box.left;
      var boxtop = ((box.height - boxheight) / 2) + box.top;
      var boxright = boxleft + boxwidth;
      var boxbottom = boxtop + boxheight;

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
         elemscore.append(digits[i]);
   }

   function setSmallScore() {
      var elemscore = $("#score-number");
      elemscore.empty();

      var digits = score.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append(digits[i]);
   }

   function setHighScore() {
      var elemscore = $("#highscore-number");
      elemscore.empty();

      var digits = highscore.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append(digits[i]);
   }

   function setpepeScore() {
      pepe = Math.floor(score / rewardThreshold);
      var elemscore = $("#pepe-number");
      elemscore.empty();

      var digits = pepe.toString().split('');
      for (var i = 0; i < digits.length; i++)
         elemscore.append(digits[i]);
   }

   function playerDead() {
      //stop animating everything!
      $(".animated").css('animation-play-state', 'paused');
      $(".animated").css('-webkit-animation-play-state', 'paused');

      //drop the pepe to the floor
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
      setpepeScore();

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
      updatepepe(score);
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
         //when that's done, refresh the page
         location.reload();
      });
   });

   function updatepepe(score) {
      $.ajax({
         url: 'include/update_pepe.php',
         type: 'POST',
         data: { score: score },
         success: function (response) {
            // Update the element with ID 'payout' with the received amount
            document.getElementById('payout').innerText = `Balance: ${response} Ᵽ`;
         },
         error: function (xhr, status, error) {
            console.error('Error updating pepe:', error);
            document.getElementById('payout').innerText = `Balance: 0 Ᵽ`;
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
      var constraint = flyArea - pipeheight - (padding * 1.6); // Double padding (for top and bottom)

      // Calculate the top pipe height ensuring it respects the padding
      var topheight = Math.floor((Math.random() * constraint) + padding); // Add lower padding

      // Calculate the bottom pipe height ensuring it respects the padding
      var bottomheight = (flyArea - pipeheight) - topheight;

      // Create and append the new pipe with the calculated heights and speed
      var newpipe = $(`
         <div class="pipe animated" 
              style="
                animation: animPipe ${pipeSpeed}ms linear; 
                width: ${pipewidth}px;">
           <div class="pipe_upper" 
                style="
                  height: ${topheight}px; 
                  width: ${pipewidth}px;">
           </div>
           <div class="pipe_lower" 
                style="
                  height: ${bottomheight}px; 
                  width: ${pipewidth}px;">
           </div>
         </div>
       `);

      // Append the new pipe to the flyarea
      $("#flyarea").append(newpipe);
      pipes.push(newpipe);

      // Remove old pipes that are off-screen
      $(".pipe").each(function () {
         // Calculate the position of the pipe
         var position = $(this).position();

         // Remove the pipe if it is off-screen (e.g., left of the flyArea)
         if (position.left + pipewidth < 0) {
            $(this).remove();
            pipes = pipes.filter(pipe => pipe[0] !== this); // Update the pipes array
         }
      });
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

   var disableZoom = function () {
      if (isIncompatible.iOS()) {
         console.log("detected iOS");
         // Prevent zoom on touchstart
         document.addEventListener('touchstart', function (event) {
            if (event.touches.length > 1) {
               event.preventDefault();
            }
         }, { passive: false });

         // Prevent zoom on gesture start
         document.addEventListener('gesturestart', function (event) {
            event.preventDefault();
         });

         // Prevent zoom on double-tap
         let lastTouchEnd = 0;
         document.addEventListener('touchend', function (event) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
               event.preventDefault(); // Prevent the double-tap zoom
            }
            lastTouchEnd = now;
         }, { passive: false });

         // Prevent default double click behavior
         document.addEventListener('dblclick', function (event) {
            event.preventDefault();
         });

         // Prevent the double-tap zoom specifically
         document.addEventListener('click', function (event) {
            if (event.detail === 2) {
               event.preventDefault();
            }
         });
      }
   };

   // Call the disableZoom function to apply the changes
   disableZoom();
})();