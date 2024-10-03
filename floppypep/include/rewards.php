<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        background-color: #333;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        width: 300px;
        text-align: center;
        display: none;
        z-index: 10000;
        justify-content: center;
        align-items: center;
        background-color: #333;
    }

    h1 {
        margin-bottom: 20px;
        color: white;
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
        align-items: center;
        justify-content: center;
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
        cursor: pointer;
        width: fit-content;
        margin-top: 20px;
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
            width: 30%;
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
            overflow: scroll;
        }

        .custom-table {
            margin-bottom: 100px;
        }
    }

    .balance {
        color: white;
        margin-top: 20px;
        font-size: 1.2em;
        word-break: break-word;
    }

    .volume {
        margin-top: 30px;
        font-size: 1.5em;
    }

    .center-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    input[type="range"] {
        width: 80%;
    }

    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 18px;
        overflow: hidden;
        font-size: 1.4em;
    }

    .custom-table thead th:first-child {
        border-top-left-radius: 18px;
    }

    .custom-table thead th:last-child {
        border-top-right-radius: 18px;
    }

    .custom-table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 18px;
    }

    .custom-table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 18px;
    }

    .custom-table a {
        color: white;
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
        <h1 id="payout">Balance: 0 Ᵽ</h1>
        <p>10 points = 1Ᵽ</p>
        <p>Claim your ⱣEPE as soon as possible!</p>
        <p id="claim-time">Server reboots at 1:00 am! This means that you will lose your ⱣEPE balance!</p>
        <div class="center-form">
            <form id="payout-form" action="include/send_payout.php" method="post">
                <label for="wallet">Wallet Address:</label>
                <input type="text" id="wallet" name="wallet" required>
                <div class="cf-turnstile" data-sitekey="0x4AAAAAAAkpV3eUV9WyKLZb"></div>
                <button type="submit">Send</button>
                <p id="error-address" style="color: red; display: none; margin-top: 0.5em;"></p>
                <p id="error-balance" style="color: red; display: none; margin-top: 0.5em;"></p>
            </form>
        </div>
        <h3 class="balance">Current balance for withdrawals: <?php echo htmlspecialchars($currentBalance); ?> Ᵽ</h3>
        <h2 class="balance" id="donationAddress">Donation address for game (click to copy):
            PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ</h2>
        <h2 class="balance" id="devAddress">Developer donation address (click to copy): PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K
        </h2>
        <div class="volume">
            <label for="volume">Volume: <span id="volume-value">30</span>%</label>
            <input type="range" id="volume" name="volume" min="0" max="100" value="30">
        </div>
        <hr>
        <table
            class="table table-striped table-bordered table-hover custom-table table-dark table-borderless table-responsive">
            <p class="mb-1">List of attacks on Game</p>
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Stolen ⱣEPE</th>
                    <th>TX Link</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2.10.2024</td>
                    <td>42,000 Ᵽ</td>
                    <td><a href="https://pepeblocks.com/tx/037fbda2b241e0a8860d30b2176734783fd533a1eb4cd1cc6853fb22124e8d47"
                            target="_blank">Open</a></td>
                    <td>Pending review for fix</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="container">
        <h1 id="payout">Balance: 0 Ᵽ</h1>
        <p>10 points = 1Ᵽ</p>
        <p>Claim your ⱣEPE as soon as possible!</p>
        <p id="claim-time">Server reboots at 1:00 am! This means that you will lose your ⱣEPE balance!</p>
        <div class="center-form">
            <form id="payout-form" action="include/send_payout.php" method="post">
                <label for="wallet">Wallet Address:</label>
                <input type="text" id="wallet" name="wallet" required>
                <div class="cf-turnstile" data-sitekey="0x4AAAAAAAkpV3eUV9WyKLZb"></div>
                <button type="submit">Send</button>
                <p id="error-address" style="color: red; display: none; margin-top: 0.5em;"></p>
                <p id="error-balance" style="color: red; display: none; margin-top: 0.5em;"></p>
            </form>
        </div>
        <h3 class="balance">Current balance for withdrawals: <?php echo htmlspecialchars($currentBalance); ?> Ᵽ</h3>
        <h2 class="balance" id="donationAddress">Donation address for game (click to copy):
            PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ</h2>
        <h2 class="balance" id="devAddress">Developer donation address (click to copy): PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K
        </h2>
        <div class="volume">
            <label for="volume">Volume: <span id="volume-value">30</span>%</label>
            <input type="range" id="volume" name="volume" min="0" max="100" value="30">
        </div>
        <hr>
        <table
            class="table table-striped table-bordered table-hover custom-table table-dark table-borderless table-responsive">
            <p class="mb-1">List of attacks on Game</p>
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Stolen ⱣEPE</th>
                    <th>TX Link</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2.10.2024</td>
                    <td>42,000 Ᵽ</td>
                    <td><a href="https://pepeblocks.com/tx/037fbda2b241e0a8860d30b2176734783fd533a1eb4cd1cc6853fb22124e8d47"
                            target="_blank">Open</a></td>
                    <td>Pending review for fix</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php include 'include/menu.php'; ?>