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

    body {
        height: 100%;
    }

    img {
        width: 300px;
    }

    .img-centered {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .centered-row>div {
        float: none;
        margin: 0 auto;
    }
</style>

<body>
    <div class="container mt-5 mb-3">
        <h2>Wallets</h2>
        <div class="row centered-row mb-3">
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('core')">Pepecoin Core <i
                        class="fa-brands fa-windows"></i> <i class="fa-brands fa-linux"></i></button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('pepeblocks')">PepeBlocks <i
                        class="fa-solid fa-globe"></i></button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('mrtwallet')">MrtWallet <i
                        class="fa-brands fa-android"></i></button>
            </div>
        </div>
        <style>
            .centered-row>div {
                float: none;
                margin: 0 auto;
            }
        </style>

        <div id="core" class="wallet-guide">
            <h1>Pepecoin Core Wallet</h1>
            <h4>About wallet</h4>
            <p>This is native very first wallet which serves also as full node for Pepecoin.</p>
            <h4>Installation</h4>
            <p>As first thing head to <a href="https://github.com/pepecoinppc/pepecoin/releases"
                    target="_blank">GitHub</a> and download wallet for your system.<br><br>
                Once you have downloaded wallet installer double click it and follow installer steps.
            </p>
            <h4>Setting up wallet</h4>
            <p>
                On first run, the wallet will need to sync with the blockchain (this could take a while so be patient).
                Once completed, you are ready to interact with the wallet.<br><br>

                After the sync is complete be sure to backup yur wallet.dat file. This file will be needed to recover
                the wallet. Store this file in a very safe place and never share it with anyone.<br><br>

                To back up the wallet.dat file, click on the File menu (top left) then click on Backup Wallet and choose
                the location to save the file to. You will need this file to restore your wallet in the future and not
                lose your funds. So store it in a very safe place.<br><br>
            </p>
            <h4>Sending transactions</h4>
            <p>
                To send Pepecoin, click on the Send tab and enter the recipient's address and the amount you want to
                send.
                You can also add a message to the transaction if you want. Once you click send, it will ask you for your
                passphrase if you have encrypted your wallet. Once you submit it, it will ask you if you want to send
                specified amount of Pepecoins to recipient.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/7.png" target="_blank">
                        <img src="/images/wallets/pepecore/7.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/8.png" target="_blank">
                        <img src="/images/wallets/pepecore/8.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/9.png" target="_blank">
                        <img src="/images/wallets/pepecore/9.png" class="mb-2">
                    </a>
                </div>
            </div>
            <h4>Accepting transactions</h4>
            <p>
                To receive Pepecoin, click on the Receive tab and click Request Payment. You can then give this address
                to the
                person who is sending you Pepecoin.<br><br>
            <div class="row centered-row">
                <div class="col-sm-6 text-center">
                    <a href="/images/wallets/pepecore/4.png" target="_blank">
                        <img src="/images/wallets/pepecore/4.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-6 text-center">
                    <a href="/images/wallets/pepecore/5.png" target="_blank">
                        <img src="/images/wallets/pepecore/5.png" class="mb-2">
                    </a>
                </div>
            </div>
            </p>
            <h4>Encrypting wallet</h4>
            <p>
                To encrypt the wallet, click on the Settings menu (top left) then click on Encrypt Wallet. You will be
                asked to enter a passphrase. This passphrase will be needed to unlock the wallet and when you send new
                transactions in the future. So store
                it in a very safe place.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/3.png" target="_blank">
                        <img src="/images/wallets/pepecore/3.png" class="mb-2">
                    </a>
                </div>
            </div>
            </p>
            <h4>Backing up wallet</h4>
            <p>
                To back up the wallet.dat file, click on the File menu (top left) then click on Backup Wallet and choose
                the location to save the file to. You will need this file to restore your wallet in the future. So store
                it in a very safe place.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/1.png" target="_blank">
                        <img src="/images/wallets/pepecore/1.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/2.png" target="_blank">
                        <img src="/images/wallets/pepecore/2.png" class="mb-2">
                    </a>
                </div>
            </div>
            </p>
            <h4>Restoring wallet</h4>
            <p>
                To restore the wallet, open in windows by search bar %appdata% folder, find Pepecoin folder or go to
                C:\Users\your-user\AppData\Roaming\Pepecoin, here
                replace wallet.dat file with your wallet. On linux it is same, but instead of %appdata% you can find
                wallet.dat in /home/your-user/.pepecoin.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepecore/6.png" target="_blank">
                        <img src="/images/wallets/pepecore/6.png" class="mb-2">
                    </a>
                </div>
            </div>
            </p>
        </div>

        <div id="pepeblocks" class="wallet-guide">
            <h1>Pepeblocks wallet</h1>
            <h4>About wallet</h4>
            <p>Pepeblocks is a lightweight wallet for Pepecoin. It is a web wallet with really simple user interface.
            </p>
            <h4>Setting up wallet</h4>
            <p>Head to <a href="https://wallet.pepeblocks.com/" target="_blank">Pepeblocks.com</a> and open wallet tab
                at top of
                page.
                Here you have 2 options, either create or import wallet (private key).<br><br>
                To create wallet you will need to choose some prefix. We have chosen simple letter a.
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/1.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/1.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            </p>
            <h4>Encrypting wallet</h4>
            <p>After you have created wallet, you can encrypt it with password. This password will be needed to unlock
                wallet and send transactions.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/2.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/2.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Sending transactions</h4>
            <p>To send transaction, click on Send tab and enter amount and address.
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/3.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/3.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Accepting transactions</h4>
            <p>To receive transaction, click on Receive tab and copy address.
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/4.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/4.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Backing up wallet</h4>
            <p>To backup wallet, click on 3 dots and click on view private key. This key is access to your wallet, so
                store it on secure place.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/5.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/5.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/6.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/6.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Restoring wallet</h4>
            <p>To restore wallet, open pepeblocks wallet homepage and click go to my wallet and import your private
                key.<br><br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/pepeblocks/7.png" target="_blank">
                        <img src="/images/wallets/pepeblocks/7.png" class="mb-2 border">
                    </a>
                </div>
            </div>
        </div>

        <div id="mrtwallet" class="wallet-guide">
            <h1>MrtWallet</h1>
            <h4>About wallet</h4>
            <p>
                MrtWallet is a mobile wallet for Pepecoin. It is available for Android devices.
            </p>
            <h4>Installation</h4>
            <p>
                Head to <a href="https://github.com/mrtnetwork/mrtwallet/releases" target="_blank">GitHub</a> and
                download MrtWallet app for your device. On android device enable installation from unknown sources and
                install app.
            <h4>Setting up wallet</h4>
            <p>
                On first screen you have multiple options on recovering of old wallet made inside of app. We will create
                new wallet and we will setup encryption password for our wallet.<br>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/1.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/1.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/2.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/2.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>Now we will need to setup mnemonic phrase. Write these words on safe place! You will need them if you
                will be recovering your wallet by this phrase! After that we will need to confirm that we have right
                words in right order.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/3.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/3.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/4.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/4.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>We will name our wallet and choose if we want to be asked for password every time we launch the app. Once
                you are ready to use our wallet, click on this last button on bottom right menu of app and list through
                list of cryptos and find and select Pepecoin.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/5.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/5.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/6.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/6.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/7.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/7.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>You will be asked to create wallet, create it and keep all default settings.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/8.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/8.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/9.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/9.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/10.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/10.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>Congrats! Now you have Pepecoin wallet! Click at the top left corner arrow button.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/11.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/11.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/12.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/12.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>If you see on bottom bar some error, change your server.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/13.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/13.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/14.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/14.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <h4>Sending transactions</h4>
            <p>Sending transactions is little complex process, but once you know how to do it, it is pretty simple.
                Click on send button. After that select from which address you will be sending from Pepe. Once you get
                past this screen, select choose all and continue to setup recipients, where you will put destination
                address and amount of how much Pepe you are sending. When you are done, scroll all the way down and send
                transaction where it will ask you for your wallet password.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/16.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/16.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/17.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/17.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/18.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/18.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/19.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/19.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/20.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/20.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <p>Congrats! Now you have sent your first transaction! Click arrow button to get back to main page of app.
            </p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/21.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/21.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <br>
            <h4>Accepting transactions</h4>
            <p>Accepting transactions is very simple, simply click on accept button and copy your address or share your
                QR code.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/15.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/15.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Backing up wallet</h4>
            <p>Backing your wallet is simple process, click in top right corner settings icon and create backup of your
                wallet. Keep this file! Since you can use it to restore your wallet!</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/22.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/22.png" class="mb-2 border">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/wallets/mrtwallet/23.png" target="_blank">
                        <img src="/images/wallets/mrtwallet/23.png" class="mb-2 border">
                    </a>
                </div>
            </div>
            <h4>Restoring wallet</h4>
            <p>Restoring wallet is straightforward process, you can restore your wallet from mnemonic phrase or your
                backed up wallet file.</p>
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