<?php
$dotenv = parse_ini_file(dirname(__DIR__) . '/.env');
session_start();

// Define the reward threshold
$reward_threshold = 10; // Change this value as needed

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

    // Initialize last_post_time if not set
    if (!isset($_SESSION['last_post_time'])) {
        $_SESSION['last_post_time'] = 0; // Last time a score was posted
    }
}

// Function to check the origin of the request
function checkRequestOrigin()
{
    $allowedDomain = 'https://pepelum.site/'; // Replace with your main domain
    $expectedSessionValue = '315?6!15641asda8erf4'; // Expected session value

    // Check if the session variable is set and matches the expected value
    if (
        !isset($_SESSION['hdfjgsjfdjkshbvfjhkvhb52g6fds4g89fds541s65!@DSF']) ||
        $_SESSION['hdfjgsjfdjkshbvfjhkvhb52g6fds4g89fds541s65!@DSF'] !== $expectedSessionValue
    ) {
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

// Calculate elapsed time since the last post
$post_time = time() - $_SESSION['last_post_time'];

// Load banned IPs from a file
$banned_ips = file('banned_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Check IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check IP passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Default fallback to REMOTE_ADDR
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$user_ip = getUserIP();

if (in_array($user_ip, $banned_ips)) {
    echo 'You were banned for malicious activity';
    exit;
}

$warning_threshold = 2500; // Number of warnings before banning

if ($post_time < 1) {
    if (!isset($_SESSION['warnings'])) {
        $_SESSION['warnings'] = 0;
    }

    $_SESSION['warnings'] += 1;

    if ($_SESSION['warnings'] >= $warning_threshold) {
        $result = file_put_contents('banned_ips.txt', $user_ip . PHP_EOL, FILE_APPEND);
        if ($result === false) {
            echo 'Error writing to banned_ips.txt';
        } else {
            session_destroy();
            echo 'You were banned for malicious activity';
        }
        exit;
    } else {
        $warnings_left = $warning_threshold - $_SESSION['warnings'];
        echo 'Slow down!';
    }
}

// Ensure the session has a valid hash
if (!isset($_SESSION['expected_hash'])) {
    echo 'Session expired or invalid!';
    exit;
}
$secret_key = $dotenv['SECRET_KEY'];
// Regenerate the hash based on session data
$calculated_hash = hash_hmac('sha256', $_SESSION['pepe'] . $_SESSION['initial_start_time'], $secret_key);

// Validate the hash by comparing it with the one stored in the session
if ($_SESSION['expected_hash'] !== $calculated_hash) {
    session_destroy();
    echo 'Your session is invalid';
    exit;
}

// Calculate elapsed time
$elapsed_time = time() - $_SESSION['start_time'];

// Calculate the maximum allowed score based on elapsed time
if ($elapsed_time < 4) {
    $max_allowed_score = 0; // Cannot score in the first 4 seconds
} else {
    // First point takes 4 seconds, each additional point takes 1 second
    $max_allowed_score = 1 + floor(($elapsed_time - 4) / 0.8);
}

// Check if the submitted score exceeds the maximum allowed score
if ($score > $max_allowed_score) {
    session_destroy();
    file_put_contents('banned_ips.txt', $user_ip . PHP_EOL, FILE_APPEND);
    echo 'Trying to cheat? Just remember, even the best water thieves get washed away eventually!';
    exit;
}

// Unset elapsed time after the check
unset($elapsed_time);

// Add the new score to the remaining score
$_SESSION['remaining_score'] += $score;

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

// Unset start_time after updating pepe
$_SESSION['start_time'] = time();
$_SESSION['last_post_time'] = time();
?>
