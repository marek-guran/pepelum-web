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

// Function to check the origin of the request
function checkRequestOrigin()
{
    $allowedDomain = 'https://pepelum.site/'; // Replace with your main domain
    $expectedSessionValue = '315?6!15641asda8erf4'; // Expected session value

    // Check if the session variable is set and matches the expected value
    if (!isset($_SESSION['hdfjgsjfdjkshbvfjhkvhb52g6fds4g89fds541s65!@DSF']) || 
        $_SESSION['hdfjgsjfdjkshbvfjhkvhb52g6fds4g89fds541s65!@DSF'] !== $expectedSessionValue) {
        // If the session variable is not set or does not match, block the request
        echo "You shall not pass!";
        exit;
    }

    // Check Origin or Referer header
    $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : null;
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

    // Verify if the request is coming from the allowed domain
    if ($origin !== $allowedDomain && (is_null($referer) || strpos($referer, $allowedDomain) !== 0)) {
        // If the request is not from the allowed domain, block it
        echo "You shall not pass!";
        exit;
    }
}

// Call the function to check if the request is coming from the correct domain
checkRequestOrigin();

// Call the function to initialize session variables
initializeSessionVariables();

// Get the score from the POST request
$score = isset($_POST['score']) ? intval($_POST['score']) : 0;

// Calculate elapsed time
$elapsed_time = time() - $_SESSION['start_time'];

// Calculate the maximum allowed score based on elapsed time
if ($elapsed_time < 4) {
    $max_allowed_score = 0; // Cannot score in the first 6 seconds
} else {
    // First point takes 10 seconds, each additional point takes 1 second
    $max_allowed_score = 1 + floor(($elapsed_time - 4) / 1);
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

// Unset elapsed time after the check
unset($elapsed_time);

// Add the new score to the remaining score
$_SESSION['remaining_score'] += $score;

// Define the reward threshold
$reward_threshold = 10; // Change this value as needed

// Store the current pepe value
$current_pepe = $_SESSION['pepe'];

// Calculate how many rewards can be given based on the new threshold
$rewards = floor($_SESSION['remaining_score'] / $reward_threshold);

// Update pepe value by adding the new rewards
$_SESSION['pepe'] = $current_pepe + $rewards;

// Update the remaining score
$_SESSION['remaining_score'] %= $reward_threshold;

// Return only the updated pepe value
echo $_SESSION['pepe'];
?>