<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");

    :root {
        --text: #83f2a9;
        --timeline: #3b3b3b;
    }

    a {
        color: inherit;
    }

    body {
        font: normal 16px/1.5 "Inter", sans-serif;
        height: 100%;
        overflow-x: hidden;
    }

    /* TIMELINE
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    .timeline {
        max-width: 1000px;
        color: var(--text);
    }

    .timeline ol {
        position: relative;
        list-style: none;
    }

    .timeline ol::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 8px;
        height: 100%;
        background: var(--timeline);
    }

    .timeline ol li .item-inner {
        padding: 20px 180px;
        margin-bottom: 50px;
    }

    .timeline ol li .time-wrapper {
        position: relative;
        font-size: 4rem;
        font-weight: bold;
        line-height: 0.9;
    }

    .timeline ol li .time-wrapper::before,
    .timeline ol li .time-wrapper::after {
        content: "";
        position: absolute;
        background: var(--timeline);
    }

    .timeline ol li .time-wrapper::before {
        top: 50%;
        left: -210px;
        transform: translateY(-50%);
        width: 0;
        height: 8px;
        transition: width 0.8s linear;
    }

    .timeline ol li .time-wrapper::after {
        top: calc(50% - 8px);
        left: -100px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        transform: scale(0);
        transform-origin: left center;
        transition: all 0.4s linear;
    }

    .timeline ol li time,
    .timeline ol li .details>* {
        opacity: 0;
        transition: 0.5s;
    }

    .timeline ol li time {
        display: inline-block;
        transform: translateY(-30px);
    }

    .timeline ol li .details>* {
        transform: translateY(30px);
    }

    .timeline ol li .details h3 {
        font-size: 2rem;
        line-height: 1;
        margin: 15px 0;
    }

    /* ANIMATION STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */

    .timeline ol li.in-view .time-wrapper::before {
        width: 120px;
    }

    .timeline ol li.in-view .time-wrapper::after {
        transition-delay: 0.8s;
        transform: scale(1.5);
    }

    .timeline ol li.in-view time,
    .timeline ol li.in-view .details>* {
        opacity: 1;
        transform: none;
    }

    .timeline ol li.in-view time {
        transition-delay: 1.3s;
    }

    .timeline ol li.in-view .details h3 {
        transition-delay: 1.5s;
    }

    .timeline ol li.in-view .details p {
        transition-delay: 1.7s;
    }

    /* MQ STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    @media (max-width: 700px) {
        .timeline ol li .item-inner {
            padding: 20px 40px;
        }

        .timeline ol li .time-wrapper::before {
            display: none;
        }

        .timeline ol li .time-wrapper::after {
            display: none;
        }

        .timeline ol li.in-view .time-wrapper::after {
            transition-delay: 0s;
        }

        .timeline ol li.in-view time {
            transition-delay: 0.5s;
        }

        .timeline ol li.in-view .details h3 {
            transition-delay: 0.7s;
        }

        .timeline ol li.in-view .details p {
            transition-delay: 0.9s;
        }
    }
</style>

<section class="timeline">
    <ol>
        <li>
            <div class="item-inner">
                <div class="time-wrapper">
                    <time>Coming Soon</time>
                </div>
                <div class="details">
                    <h3>List of planned changes</h3>
                    <p>- Matt Furie (copyright rights to use PEPE),<br>
                        - Pepecoin Merch Store,<br>
                        - New design of website, social media banners and ads,<br>
                        - New professional Pepecoin logo,<br>
                        - New exchanges, including fiat to crypto onramp services,<br>
                        - Mobile, web, desktop wallets listings<br>
                        - Branded hardware wallets like Tangem, Trezor...<br>
                        - Pepecoin as payment option on services like BitPay, Crypto.com Pay, Coinbase Commerce, and
                        Cryptocurrency Checkout
                    </p>
                </div>
            </div>
        </li>
        <li>
            <div class="item-inner">
                <div class="time-wrapper">
                    <time>27.08.2024</time>
                </div>
                <div class="details">
                    <h3>TradeOgre Listing</h3>
                    <p>Pepecoin got listed this day on new exchange named <a
                            href="https://tradeogre.com/exchange/PEP-USDT" target="_blank">tradeogre.com</a>.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="item-inner">
                <div class="time-wrapper">
                    <time>08.08.2024</time>
                </div>
                <div class="details">
                    <h3>Telegram Tip Bot</h3>
                    <p>This day was Pepecoin listed on Telegram bot called UltimateTipBot with also special branding as
                        PepecoinTipBot. Thanks to this now can even Telegram users experience tips and rains just like
                        on Discord or Reddit.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="item-inner">
                <div class="time-wrapper">
                    <time>17.05.2024</time>
                </div>
                <div class="details">
                    <h3>Hard Fork (Merge mining)</h3>
                    <p>17th May happend hard fork which enabled at block 42,000 merge mining allowing Pepecoin to take
                        advantage from whole SCRYPT network security</p>
                </div>
            </div>
        </li>
        <li>
            <div class="item-inner">
                <div class="time-wrapper">
                    <time>30.01.2024</time>
                </div>
                <div class="details">
                    <h3>Release</h3>
                    <p>Fairly launched without pre-mining, with option to store Pepecoin on Pepecoin Core wallet.
                        Pepecoin is also available on Discord and Reddit using tip bots.</p>
                </div>

                <?php
                include 'src/donations.php';
                ?>
            </div>
        </li>
    </ol>
</section>

<script src="/scripts/roadmap.js"></script>