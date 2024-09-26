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
$_SESSION['hdfjgsjfdjkshbvfjhkvhb52g6fds4g89fds541s65!@DSF'] = '315?6!15641asda8erf4';
?>
<div id="gamecontainer">
    <div id="gamescreen">
        <div id="sky" class="animated">
            <div id="flyarea">
                <div id="ceiling" class="animated"></div>
                <div id="ceiling2" class="animated"></div>
                <div id="ceiling3" class="animated"></div>
                <!-- This is the flying and pipe area container -->
                <div id="player" class="pepe animated"></div>

                <div id="bigscore" class="font-score"></div>

                <div id="splash"></div>

                <div id="scoreboard">
                    <h1 class="font-over">GAME OVER</h1>
                    <div class="card">
                        <div id="pepe-label" class="font">PEPE</div>
                        <div id="pepe-number" class="font-number">0 PEPE</div>
                        <div id="score-label" class="font">SCORE</div>
                        <div id="score-number" class="font-number">0</div>
                        <div id="highscore-label" class="font">HIGHSCORE</div>
                        <div id="highscore-number" class="font-number">0</div>
                        <div id="replay"><img src="assets/replay.png" alt="replay"></div>
                    </div>
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