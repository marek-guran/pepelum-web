<?php
$transactionString = null;
$amount = null;

if (isset($_GET['p'])) {
    $params = explode('?amount=', $_GET['p']);
    if (strpos($params[0], 'payout=') === 0) {
        $transactionString = substr($params[0], 7); // Adjusted to match 'payout=' length
    }
    if (isset($params[1])) {
        $amount = htmlspecialchars($params[1]);
    }
}
?>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: #333;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container.full-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .card {
        word-break: break-word;
        display: block;
        width: 95% !important;
    }

    .card-body {
        width: 100%;
        text-align: center;
        /* Center text inside the card body */
    }

    .card-text {
        width: 100%;
    }

    .btn-custom {
        font-size: 3em;
        /* Set button size to 5em */
        border-radius: 18px;
    }
</style>
<?php if ($transactionString): ?>
    <div class="container full-page">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">ⱣEPE Sent!</h1>
                <?php if ($amount): ?>
                    <p class="card-text">Claimed: <?php echo $amount; ?> ⱣEPE</p>
                <?php endif; ?>
                <p class="card-text transaction-link">Transaction: <a
                        href="https://pepeexplorer.com/tx/<?php echo htmlspecialchars($transactionString); ?>"
                        target="_blank"><?php echo htmlspecialchars($transactionString); ?></a></p>
                <p class="card-text">Your ⱣEPE is on the way! Please be patient. Transaction will be visible on the blockchain
                    once there is found a new block.</p>
                <a href="https://pepelum.site/floppypep/" class="btn btn-primary btn-custom mt-3">Back to Game</a>
            </div>
        </div>
    </div>
<?php endif; ?>