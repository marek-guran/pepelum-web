<?php
session_start();

function initializeSessionVariables() {
    // Initialize pepe if not set
    if (!isset($_SESSION['pepe'])) {
        $_SESSION['pepe'] = 0;
    }

    // Initialize remaining_score if not set
    if (!isset($_SESSION['remaining_score'])) {
        $_SESSION['remaining_score'] = 0;
    }
}

// Call the function to initialize session variables
initializeSessionVariables();

// Get the score from the POST request
$score = isset($_POST['score']) ? intval($_POST['score']) : 0;

// Add the new score to the remaining score
$_SESSION['remaining_score'] += $score;

// Define the reward threshold
$reward_threshold = 100;

// Calculate how many rewards can be given
$rewards = floor($_SESSION['remaining_score'] / $reward_threshold);

// Update pepe value
$_SESSION['pepe'] += $rewards;

// Update the remaining score
$_SESSION['remaining_score'] %= $reward_threshold;

// Return the updated pepe value
echo json_encode($_SESSION['pepe']);
?>
