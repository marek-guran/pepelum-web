<style>
    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    a {
        color: #169441 !important;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    h1 {
        font-weight: 700;
        color: white;
    }

    hr {
        color: white;
    }

    .mining,
    .wallet,
    .buy,
    .bot,
    .roadmap,
    .about,
    .server {
        position: relative;
        overflow: hidden;
        background-color: black;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-image 0.5s ease;
    }

    .mining span,
    .wallet span,
    .buy span,
    .bot span,
    .roadmap span,
    .about span,
    .server span {
        transition: opacity 0.5s ease;
    }

    .mining:hover span,
    .wallet:hover span,
    .buy:hover span,
    .bot:hover span,
    .roadmap:hover span,
    .about:hover span,
    .server:hover span {
        opacity: 0;
    }

    .mining:hover {
        background-image: url('/images/home/mining.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .wallet:hover {
        background-image: url('/images/home/wallet.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .buy:hover {
        background-image: url('/images/home/buy.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .bot:hover {
        background-image: url('/images/home/bot.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .roadmap:hover {
        background-image: url('/images/home/roadmap.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .about:hover {
        background-image: url('/images/home/about.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .server:hover {
        background-image: url('/images/home/server.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-color: black;
    }
</style>
<div class="container mt-5 home-margin">
    <h1 class="text-center mb-4 raleway bold">Pepelum, <a href="https://pepecoin.org/" target="_blank"
            rel="noopener noreferrer">₱epecoin</a> helper</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <a href="?p=wallets" class="btn btn-primary w-100 mb-4 wallet"><span><i class="fa-solid fa-wallet"></i>
                    Wallets</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=mining" class="btn btn-primary w-100 mb-4 mining"><span><i class="fa-solid fa-water-ladder"></i>
                    Mining</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=getpepecoin" class="btn btn-primary w-100 mb-4 buy"><span><i
                        class="fa-solid fa-bag-shopping"></i> Get
                    Pepecoin</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=bots" class="btn btn-primary w-100 mb-4 bot"><span><i class="fa-solid fa-robot"></i> Discord and
                    Reddit
                    bots</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=roadmap" class="btn btn-primary w-100 mb-4 roadmap"><span><i class="fa-solid fa-map"></i>
                    Roadmap</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=electrumX" class="btn btn-primary w-100 mb-4 server"><span><i
                        class="fa-solid fa-circle-info"></i> ElectrumX Server</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=about" class="btn btn-primary w-100 mb-4 about"><span><i class="fa-solid fa-circle-info"></i>
                    About Pepecoin</span></a>
        </div>
    </div>
</div>