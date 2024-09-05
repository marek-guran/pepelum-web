<style>
    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    a {
        color: #169441 !important;
        text-decoration: none !important;
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
            rel="noopener noreferrer">Ᵽepecoin</a> helper</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <a href="?p=wallets" class="btn btn-primary w-100 mb-4 wallet"><span><i class="fa-solid fa-wallet"></i>
                    Wallets</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=mining" class="btn btn-primary w-100 mb-4 mining"><span><svg xmlns="http://www.w3.org/2000/svg"
                        width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.79 10.62L3.5 21.9l-1.4-1.4L13.38 9.21zm4.48-2.89l.59-.59l-.79-.79l.64-.64l-1.42-1.42l-.64.64l-.79-.79l-.59.59c-1.74-1.42-3.7-2.56-5.8-3.36l-.83 1.79c1.75.92 3.36 2.03 4.86 3.34L14 7l3 3l.5-.5c1.31 1.5 2.42 3.11 3.34 4.86l1.79-.83c-.8-2.1-1.94-4.06-3.36-5.8">
                        </path>
                    </svg>
                    Mining</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=getpepecoin" class="btn btn-primary w-100 mb-4 buy"><span><i
                        class="fa-solid fa-bag-shopping"></i> Get
                    Pepecoin</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=bots" class="btn btn-primary w-100 mb-4 bot"><span><i class="fa-solid fa-robot"></i> Tip Bots</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=roadmap" class="btn btn-primary w-100 mb-4 roadmap"><span><i class="fa-solid fa-map"></i>
                    Roadmap</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=electrumX" class="btn btn-primary w-100 mb-4 server"><span><i class="fa-solid fa-server"></i>
                    ElectrumX Server</span></a>
        </div>
        <div class="col-md-3">
            <a href="?p=about" class="btn btn-primary w-100 mb-4 about"><span><i class="fa-solid fa-circle-info"></i>
                    About Pepecoin</span></a>
        </div>
    </div>
</div>