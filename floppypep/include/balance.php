<?php
session_start();

// Initialize session variables if not already set
if (!isset($_SESSION['pepe'])) {
    $_SESSION['pepe'] = 0;
}

// Return the balance as plain text (a number)
header('Content-Type: text/plain');
echo $_SESSION['pepe'];
?>
