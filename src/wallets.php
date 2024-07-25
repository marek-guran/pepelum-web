<style>
    .wallet-guide {
        display: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    p,
    a {
        color: white;
    }
</style>

<body>
    <div class="container mt-5">
        <h2>Wallets</h2>
        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-primary w-100" onclick="showGuide('core')">Pepecoin Core</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100" onclick="showGuide('pepeblocks')">PepeBlocks</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100" onclick="showGuide('mrtwallet')">MrtWallet</button>
            </div>
        </div>

        <div id="core" class="wallet-guide">
            <h1>Pepecoin Core Wallet</h1>
            <h4>About wallet</h4>
            <p>This is native very first wallet which serves also as full node for Pepecoin.</p>
            <h4>Installation</h4>
            <p>As first thing head to <a href="https://github.com/pepecoinppc/pepecoin/releases"
                    target="_blank">GitHub</a> and download wallet for your system.<br><br>
                Once you have downloaded wallet installer...
            </p>
            <h4>Sending transactions</h4>
            <h4>Accepting transactions</h4>
            <h4>Encrypting wallet</h4>
            <h4>Backing up wallet</h4>
            <h4>Restoring wallet</h4>
        </div>

        <div id="pepeblocks" class="wallet-guide">
            <h1>Pepeblocks wallet</h1>
            <h4>About wallet</h4>
            <p>Web wallet...</p>
            <h4>Sending transactions</h4>
            <h4>Accepting transactions</h4>
            <h4>Backing up wallet</h4>
            <h4>Restoring wallet</h4>
        </div>

        <div id="mrtwallet" class="wallet-guide">
            <h1>MrtWallet</h1>
            <h4>About wallet</h4>
            <p>Android app..</p>
            <h4>Installation</h4>
            <h4>Setting up wallet</h4>
            <h4>Sending transactions</h4>
            <h4>Accepting transactions</h4>
            <h4>Backing up wallet</h4>
            <h4>Restoring wallet</h4>
        </div>
    </div>

    <script>
        function showGuide(guideId) {
            document.querySelectorAll('.wallet-guide').forEach(function (guide) {
                guide.style.display = 'none';
            });

            document.getElementById(guideId).style.display = 'block';
        }
    </script>
</body>