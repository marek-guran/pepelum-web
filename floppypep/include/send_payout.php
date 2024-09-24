<?php
session_start(); // Ensure the session is started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify Turnstile CAPTCHA token
    $token = $_POST['cf-turnstile-response'];
    $secret = ''; // Replace with your Cloudflare Turnstile secret key

    // Prepare data for Turnstile verification
    $data = array(
        'secret' => $secret,
        'response' => $token
    );

    // Initialize cURL request to verify CAPTCHA
    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);
    curl_close($verify);

    $captchaSuccess = json_decode($response);

    // Check CAPTCHA verification result
    if ($captchaSuccess->success) {
        // Retrieve wallet address from form input
        $walletAddress = $_POST['wallet'];

        // Retrieve the amount of Pepecoins from the session
        $payoutValue = $_SESSION['pepe'];

        // Extract the numeric value from the payout string (e.g., "Amount: 34 Ᵽ")
        $pepe = $payoutValue;

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
                    unset($_SESSION['start_time']);
                    unset($_SESSION['score']);
                    session_destroy();
                    header("Location: https://pepelum.site/floppypep/");
                    exit();
                }
            } else {
                echo "Error: Unable to execute Pepecoin CLI command.";
            }
        } else {
            echo "Error: The amount of Pepecoins to send must be greater than 0.";
        }
    } else {
        // CAPTCHA failed
        echo "CAPTCHA verification failed. Please try again.";
    }
}
?>
