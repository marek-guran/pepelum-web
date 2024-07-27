<style>
    body {
        height: 100%;
    }
</style>

<body>
    <div class="container mt-5 mb-3">
        <h2>Get Pepecoin</h2>
        <div class="row centered-row mb-3">
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('xeggex')">Xeggex</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('stakecube')">Stakecube</button>
            </div>
        </div>

        <div id="xeggex" class="guide">
            <h1>Xeggex</h1>
            <h4>Set up</h4>
            <p>Register at <a href="https://xeggex.com/" target="_blank">xeggex.com</a> and follow further steps (Guide
                is using Xeggex mobile app).</p>
            <h4>Depositing USDT</h4>
            <p>Go to the wallet section and click on DEPOSIT button and search for USDT. Once you find it, select it and
                pick network, after that you will be given deposit address where you will send USDT. Minimum deposit is
                1 USDT!</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/1.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/1.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/2.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/2.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/3.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/3.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/4.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/4.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/5.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/5.png" class="mb-2">
                    </a>
                </div>
            </div>
            <h4>Buying Pepecoin</h4>
            <p>Once you see in your wallet USDT, head to Markets and search for Pepecoin and open it. Here you will
                click at BUY button and input how much Pepe and for what price you will buy. Once you are satisfied,
                click buy button. (If you select price that is not in the RED table, it may take longer to fill your
                order.) Once you buy Pepecoin, it will be on your Xeggex wallet.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/6.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/6.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/7.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/7.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/8.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/8.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/9.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/9.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/10.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/10.png" class="mb-2">
                    </a>
                </div>
            </div>
            <h4>Withdrawing Pepecoin</h4>
            <p>To withdraw your Pepecoin, click on it on your wallet and click on button WITHDRAW. There you will fill
                all information like amount, address, confirm transaction and input 2-FA to send transaction. And once
                the payment is done, it will say CONFIRMED.</p>
            <div class="row centered-row">
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/11.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/11.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/12.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/12.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/13.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/13.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/14.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/14.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/images/getpepecoin/xeggex/15.png" target="_blank">
                        <img src="/images/getpepecoin/xeggex/15.png" class="mb-2">
                    </a>
                </div>
            </div>
        </div>

        <div id="stakecube" class="guide">
            <h1>Stakecube</h1>
            <h4>Depositing USDT</h4>
            <h4>Buying Pepecoin</h4>
            <h4>Withdrawing Pepecoin</h4>
        </div>

        <script>
            function showGuide(guideId) {
                document.querySelectorAll('.guide').forEach(function (guide) {
                    guide.style.display = 'none';
                });

                document.getElementById(guideId).style.display = 'block';
            }
        </script>
</body>