<style>
    body {
        height: 100%;
    }
</style>

<body>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2><img class="pepelogo" src="/images/pepecoin-logo.svg" alt="Pepecoin logo"> About Pepecoin</h2>
                <p>Pepecoin is a community focused cryptocurrency created by one of the original Dogecoin shibes from
                    2013. It
                    was created for one purpose, to create a new and fun community just like the original Dogecoin
                    community.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M14.79 10.62L3.5 21.9l-1.4-1.4L13.38 9.21zm4.48-2.89l.59-.59l-.79-.79l.64-.64l-1.42-1.42l-.64.64l-.79-.79l-.59.59c-1.74-1.42-3.7-2.56-5.8-3.36l-.83 1.79c1.75.92 3.36 2.03 4.86 3.34L14 7l3 3l.5-.5c1.31 1.5 2.42 3.11 3.34 4.86l1.79-.83c-.8-2.1-1.94-4.06-3.36-5.8">
                                </path>
                            </svg> Layer 1</h4>
                        <p>Pepecoin is a layer 1 blockchain, not an ERC20 token. There are no confusing smart contracts
                            that can be used
                            by bad actors to steal funds.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4><i class="fa-solid fa-terminal"></i> Born from Dogecoin</h4>
                        <p>Pepecoin is a fork of Dogecoin. Developers and users familiar with Dogecoin will feel right
                            at home with
                            Pepecoin.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4><i class="fa-solid fa-shield-halved"></i> Secure Blockchain</h4>
                        <p>Like Dogecoin, Pepecoin's blockchain is secured using <a
                                href="https://en.bitcoin.it/wiki/Merged_mining_specification" target="_blank">Merged
                                Mining</a>.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4><i class="fa-solid fa-user-shield"></i> Safe</h4>
                        <p>Pepecoin is completely open source. You can view the source code <a
                                href="https://github.com/pepecoinppc/pepecoin" target="_blank">here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-3">
                <h3>Community on
                    <a href="https://pepecoin.org/discord" target="_blank" class="no-style-link">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                    Discord and
                    <a href="https://reddit.com/r/pepecoin" target="_blank" class="no-style-link">
                        <i class="fa-brands fa-reddit"></i>
                    </a>
                    Reddit!
                </h3>
                <p>
                    Join the Pepecoin community on <a href="https://pepecoin.org/discord" target="_blank">
                        Discord
                    </a> and <a href="https://reddit.com/r/pepecoin" target="_blank">
                        Reddit</a>! Community is tipping Pepecoins on Discord in
                    channel
                    #toad-tavern and on Reddit you get tipped also by community depending how much people like it and
                    want to tip you something!<br><br>
                    We have also frequently events, where you can get hold of some Pepecoins!<br><br>
                    Our Discord is active, as you can see how many users are online!
                </p>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <iframe src="https://discord.com/widget?id=1162499246503759962&theme=dark" width="100%" height="500"
                    allowtransparency="true" frameborder="0"
                    sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
            <div class="col-12 col-md-6">
                <h3><i class="fa-solid fa-coins"></i> What is current price per coin?</h3>
                <script src="https://widgets.coingecko.com/gecko-coin-ticker-widget.js"></script>
                <gecko-coin-ticker-widget locale="en" dark-mode="true" transparent-background="false" outlined="true"
                    coin-id="pepecoin-network" initial-currency="usd"></gecko-coin-ticker-widget>
                <h3><i class="fa-solid fa-cart-shopping mt-3"></i> How many could I get?</h3>
                <script src="https://widgets.coingecko.com/gecko-coin-converter-widget.js"></script>
                <gecko-coin-converter-widget locale="en" dark-mode="true" transparent-background="true"
                    coin-id="pepecoin-network" initial-currency="usd"></gecko-coin-converter-widget>
                <h3><i class="fa-solid fa-book mt-3"></i> Learn more</h3>
                <p>Learn more at <a href="https://pepecoin.org/" target="_blank">
                        Official Pepecoin Website</a>!</p>
            </div>
        </div>
        <?php
        include 'src/donations.php';
        ?>
    </div>
</body>