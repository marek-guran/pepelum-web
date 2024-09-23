<?php
session_start();
unset($_SESSION['start_time']);
unset($_SESSION['score']);
unset($_SESSION['remaining_score']);

// Set initial values if not already set
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time(); // Record the start time
    $_SESSION['score'] = 0; // Initialize score
}
?>
<div id="gamecontainer">
    <div id="gamescreen">
        <div id="sky" class="animated">
            <div id="flyarea">
                <div id="ceiling" class="animated"></div>
                <!-- This is the flying and pipe area container -->
                <div id="player" class="bird animated"></div>

                <div id="bigscore"></div>

                <div id="splash"></div>

                <div id="scoreboard">
                    <div id="pepe"></div>
                    <div id="currentscore"></div>
                    <div id="highscore"></div>
                    <div id="replay"><img src="assets/replay.png" alt="replay"></div>
                </div>

                <!-- Pipes go here! -->
            </div>
        </div>
        <div id="land" class="animated">
            <div id="debug"></div>
        </div>
    </div>
</div>
<div class="boundingbox" id="playerbox"></div>
<div class="boundingbox" id="pipebox"></div>
