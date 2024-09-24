<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        width: 300px;
        text-align: center;
        display: none;
        z-index: 10000;
        background-color: #333;
    }

    h1 {
        margin-bottom: 20px;
        color: white;
        font-size: 1.5em !important;
    }

    p {
        color: white;
    }

    label {
        margin-top: 30px !important;
        color: #fff !important;
        text-align: left;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        color: #555;
        text-align: left;
    }

    input[type="text"] {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 18px;
        font-size: 16px;
    }

    button {
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 18px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    @media (min-width: 768px) {
        .container {
            display: block;
            position: fixed;
            top: 0;
            right: 0;
            width: 20%;
            height: 100vh;
            overflow-y: auto;
        }

        body {
            justify-content: flex-start;
            align-items: flex-start;
        }
    }

    @media (max-width: 767px) {
        .container.full-page {
            display: block;
            width: 100%;
            height: 100vh;
            position: static;
            box-shadow: none;
        }
    }

    .balance {
        color: white;
        margin-top: 20px;
        font-size: 1.2em;
        word-break: break-word;
    }
</style>

<?php
// Function to get the current balance
function getBalance()
{
    $command = "/home/pi/pepecoin/bin/pepecoin-cli -datadir=/home/pi/.pepecoin getbalance";
    $output = shell_exec($command);
    return $output ? trim($output) : 0; // Return the balance or 0 if there was an issue
}

// Get the current balance for display
$currentBalance = getBalance();
?>

<?php if (isset($_GET['p']) && $_GET['p'] == 'rewards'): ?>
    <div class="container full-page">
        <h1 id="payout">Amount: 0 Ᵽ</h1>
        <p>10 points = 1Ᵽ</p>
        <p id="claim-time">Claim your points before 1:00 am!</p>
        <p>Otherwise you risk losing all your ⱣEPE!</p>
        <form id="payout-form" action="include/send_payout.php" method="post">
            <label for="wallet">Wallet Address:</label>
            <input type="text" id="wallet" name="wallet" required>
            <button type="submit">Send</button>
            <p id="error-message" style="color: red; display: none;">Wrong address format. Wallet address must start with a
                capital letter "P".</p>
        </form>
        <h3 class="balance">Current balance for withdrawals: <?php echo htmlspecialchars($currentBalance); ?> Ᵽ</h3>
        <h2 class="balance" id="donationAddress">Donation address for game (click to copy):
            PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ</h2>
        <h2 class="balance" id="devAddress">Developer donation address (click to copy): PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K
        </h2>
    </div>
<?php else: ?>
    <div class="container">
        <h1 id="payout">Amount: 0 Ᵽ</h1>
        <p>10 points = 1Ᵽ</p>
        <p id="claim-time">Claim your points before 1:00 am!</p>
        <p>Otherwise you risk losing all your ⱣEPE!</p>
        <form action="include/send_payout.php" method="post">
            <label for="wallet">Wallet Address:</label>
            <input type="text" id="wallet" name="wallet" required>
            <button type="submit">Send</button>
        </form>
        <h3 class="balance">Current balance for withdrawals: <?php echo htmlspecialchars($currentBalance); ?> Ᵽ</h3>
        <h2 class="balance" id="donationAddress">Donation address for game (click to copy):
            PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ</h2>
        <h2 class="balance" id="devAddress">Developer donation address (click to copy): PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K
        </h2>
    </div>
<?php endif; ?>
<?php include 'include/menu.php'; ?>