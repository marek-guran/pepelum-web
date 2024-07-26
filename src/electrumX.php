<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepelum - ElectrumX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Meta tags for Pepecoin -->
    <meta name="description"
        content="Pepecoin is a community-focused cryptocurrency, born from Dogecoin, offering a simple Layer 1 blockchain without complex smart contracts.">
    <meta name="keywords" content="Pepecoin, Cryptocurrency, Dogecoin, Community, Blockchain, Layer 1, ElectrumX, Node">
    <meta property="og:title" content="PEPELUM, Pepecoin ElectrumX server">
    <meta property="og:description"
        content="Pepecoin is a community focused cryptocurrency created by one of the original Dogecoin shibes. A simple Layer 1 blockchain for a new and fun community.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.pepecoin.com">
    <meta property="og:image" content="https://www.pepecoin.com/pepecoin-logo.png">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            margin: 0;
            height: 100%;
        }

        .raleway {
            font-family: 'Raleway';
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            text-align: center;
            word-wrap: break-word;
        }

        h1 {
            font-weight: 700;
        }

        a {
            color: #0b722e;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-outline-primary {
            border-color: #0b722e;
            color: #0b722e;
            border-radius: 20px;
            outline: none;
        }

        .btn-outline-primary:hover, .btn-outline-primary:active {
            background-color: #0b722e !important;
            color: white !important;
            border-radius: 20px;
        }

        ::selection {
            background-color: #0b722e;
            color: white;
        }

        .copy-button {
            cursor: pointer;
            margin-left: 10px;
        }

        .qr-button {
            margin-left: 10px;
        }

        hr {
            border-top: 1px solid #ddd;
            margin: 2rem 0;
        }

        .lead {
            font-weight: 400;
        }

        .modal-img {
            width: 100%;
            height: auto;
        }

        p {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="raleway">Welcome to PEPELUM, <a href="https://pepecoin.org/" target="_blank"
                rel="noopener noreferrer">₱epecoin</a>
            ElectrumX server</h1>
        <hr>
        <p class="lead raleway"><strong>Connect to server using:</strong></p>
        <ul class="list-unstyled">
            <li class="mb-3"><strong>TCP:</strong> <span id="tcpAddress">tcp://electrum.pepelum.site:50001</span> <button
                    class="btn btn-sm btn-outline-primary copy-button" data-clipboard-target="#tcpAddress">Copy</button>
            </li>
            <li class="mb-3"><strong>SSL:</strong> <span id="sslAddress">ssl://electrum.pepelum.site:50002</span> <button
                    class="btn btn-sm btn-outline-primary copy-button" data-clipboard-target="#sslAddress">Copy</button>
            </li>
            <li class="mb-3"><strong>WebSocket (WSS):</strong> <span
                    id="wssAddress">wss://electrum.pepelum.site:50004</span> <button
                    class="btn btn-sm btn-outline-primary copy-button" data-clipboard-target="#wssAddress">Copy</button>
            </li>
        </ul>
        <hr>
        <p class="lead raleway"><strong>You can support this server by donating:</strong></p>
        <p><strong>Pepecoin:</strong> <span id="donationAddressPEPE">PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K</span>
            <button class="btn btn-sm btn-outline-primary copy-button"
                data-clipboard-target="#donationAddressPEPE">Copy</button>
            <button class="btn btn-sm btn-outline-primary qr-button" data-bs-toggle="modal"
                data-bs-target="#qrModalPEPE">QR Code</button>
        </p>
        <p><strong>Dogecoin:</strong> <span id="donationAddressDOGE">DMAsT9YJgUEz6WryFTtvhWX19VAzVGiZ14</span>
            <button class="btn btn-sm btn-outline-primary copy-button"
                data-clipboard-target="#donationAddressDOGE">Copy</button>
            <button class="btn btn-sm btn-outline-primary qr-button" data-bs-toggle="modal"
                data-bs-target="#qrModalDOGE">QR Code</button>
        </p>
        <p><strong>Litecoin:</strong> <span id="donationAddressLTC">ltc1q34vd7ecr2z3f0euqamxg2j93lwkdp5c4s33rsc</span>
            <button class="btn btn-sm btn-outline-primary copy-button"
                data-clipboard-target="#donationAddressLTC">Copy</button>
            <button class="btn btn-sm btn-outline-primary qr-button" data-bs-toggle="modal"
                data-bs-target="#qrModalLTC">QR Code</button>
        </p>
        <hr>
        <p class="lead raleway"><a href="https://electrumx-spesmilo.readthedocs.io/" target="_blank"
                rel="noopener noreferrer"><strong>Documentation,</strong></a> this server uses <a
                href="https://github.com/PepeEnthusiast/electrumx-pepecoin" target="_blank"
                rel="noopener noreferrer"><strong>modified ElectrumX</strong></a></p>
        <p>ElectrumX 1.16.0</p>
    </div>

    <!-- QR Code Modal -->
    <div class="modal fade" id="qrModalPEPE" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Donate by Pepecoin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://pepeexplorer.com/qr/PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K" alt="Donation QR Code">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="qrModalDOGE" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Donate by Dogecoin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="/images/qr/qr-DMAsT9YJgUEz6WryFTtvhWX19VAzVGiZ14.png" alt="Donation QR Code" class="modal-img">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="qrModalLTC" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Donate by Litecoin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="/images/qr/qr-ltc1q34vd7ecr2z3f0euqamxg2j93lwkdp5c4s33rsc.png" alt="Donation QR Code"
                        class="modal-img">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.copy-button');

        clipboard.on('success', function (e) {
            e.trigger.textContent = 'Copied';
            setTimeout(function () {
                e.clearSelection();
                e.trigger.textContent = 'Copy';
            }, 1500);
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
</body>

</html>