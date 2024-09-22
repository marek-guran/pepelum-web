<?php
session_start(); // Ensure the session is started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve wallet address from form input
    $walletAddress = $_POST['wallet'];

    // Retrieve the amount of Pepecoins from the hidden input
    $payoutValue = $_POST['payoutValue'];

    // Extract the numeric value from the payout string (e.g., "Amount: 34 Ᵽ")
    preg_match('/Amount: (\d+) Ᵽ/', $payoutValue, $matches);
    $pepe = isset($matches[1]) ? (int) $matches[1] : 0;

    // Check if the amount of Pepecoins is greater than 0
    if ($pepe > 0) {
        // Command to send Pepecoins using Pepecoin Core CLI
        $command = "/home/pi/pepecoin/bin/pepecoin-cli -datadir=/home/pi/.pepecoin sendtoaddress " . escapeshellarg($walletAddress) . " " . escapeshellarg($pepe);

        // Open a process and capture the output and error
        $descriptorspec = [
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w']  // stderr
        ];
        $process = proc_open($command, $descriptorspec, $pipes);

        if (is_resource($process)) {
            $output = stream_get_contents($pipes[1]);
            $errorOutput = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            // Check for errors
            if ($return_value !== 0) {
                // Display the actual error returned by the Pepecoin CLI
                echo "Error: Unable to send Pepecoins. CLI output: $output Error output: $errorOutput";
            } else {
                echo "Success: Sent $pepe Ᵽ to $walletAddress. CLI output: $output";
                $_SESSION['pepe'] = 0; // Set pepe to 0 after successful transaction
                header("Location: https://pepelum.site/floppypep/");
                exit();
            }
        } else {
            echo "Error: Unable to execute Pepecoin CLI command.";
        }
    } else {
        echo "Error: The amount of Pepecoins to send must be greater than 0.";
    }
}
?>