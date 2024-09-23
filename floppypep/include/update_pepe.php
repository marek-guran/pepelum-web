<?php
session_start();

function initializeSessionVariables()
{
    // Initialize pepe if not set
    if (!isset($_SESSION['pepe'])) {
        $_SESSION['pepe'] = 0;
    }

    // Initialize remaining_score if not set
    if (!isset($_SESSION['remaining_score'])) {
        $_SESSION['remaining_score'] = 0;
    }

    // Initialize start time if not set
    if (!isset($_SESSION['start_time'])) {
        $_SESSION['start_time'] = time(); // Record the start time
    }
}

// Call the function to initialize session variables
initializeSessionVariables();

// Get the score from the POST request
$score = isset($_POST['score']) ? intval($_POST['score']) : 0;

// Calculate elapsed time
$elapsed_time = time() - $_SESSION['start_time'];

// Calculate the maximum allowed score based on elapsed time
if ($elapsed_time < 6) {
    $max_allowed_score = 0; // Cannot score in the first 6 seconds
} else {
    // First point takes 10 seconds, each additional point takes 1 second
    $max_allowed_score = 1 + floor(($elapsed_time - 6) / 1);
}

// Check if the submitted score exceeds the maximum allowed score
if ($score > $max_allowed_score) {
    // Reset the score due to suspicious activity
    $_SESSION['remaining_score'] = 0;
    $_SESSION['pepe'] = 0;
    echo $_SESSION['pepe']; // Return the updated pepe value (which is 0)
    unset($_SESSION['start_time']);
    unset($_SESSION['score']);
    exit;
}

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

// Return only the updated pepe value
echo $_SESSION['pepe'];
?>