<?php
session_start();
header('Content-Type: application/json');
$currentPepeBalance = isset($_SESSION['pepe']) ? $_SESSION['pepe'] : 0;
echo json_encode(['currentPepeBalance' => $currentPepeBalance]);
?>