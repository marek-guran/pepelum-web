<style>
    .bots-guide {
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
        <h2>Discord and Reddit bots</h2>
        <div class="row centered-row mb-3">
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('discord')">Discord bot <i
                        class="fa-brands fa-discord"></i></button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('reddit')">Reddit bot <i
                        class="fa-brands fa-reddit"></i></button>
            </div>
        </div>

        <div id="discord" class="bots-guide">
            <h1>Discord bot</h1>
            <h4>Withdrawing</h4>
            <p>Private message ℙ𝔼ℙ𝔼 𝔻𝕀𝕊ℙ𝔼ℕ𝕊𝔼ℝ (tip.cc) bot and follow steps like in sample conversation:<br><br>
                <i class="fa-solid fa-user"></i> $withdraw pepe<br>
                <i class="fa-solid fa-robot"></i> ❔ Enter your Pepecoin (PEPE) destination address<br>
                <i class="fa-solid fa-user"></i> Pudye4nXpSfiMnwjuNRsAQ8dxeKPBQpQff<br>
                <i class="fa-solid fa-robot"></i> ❔ How much Pepecoin (PEPE) do you want to withdraw? You have
                308,387.25850331 PEPE. Reply with all to withdraw all.<br>
                <i class="fa-solid fa-user"></i> all or for example 300000<br>
                <i class="fa-solid fa-robot"></i> Please confirm withdrawal by click approval button<br>
                <i class="fa-solid fa-user"></i> You click confirm button<br>
                <i class="fa-solid fa-robot"></i> ⤴ Pepecoin sent
            </p>
            <h4>Depositing</h4>
            <p>Private message ℙ𝔼ℙ𝔼 𝔻𝕀𝕊ℙ𝔼ℕ𝕊𝔼ℝ (tip.cc) bot and follow steps like in sample conversation:<br><br>
                <i class="fa-solid fa-user"></i> $deposit pepe<br>
                <i class="fa-solid fa-robot"></i> ⤵ Deposit Pepecoin. Deposits need at least 10 confirmations to be credited to your account. Your deposit address: Pudye4nXpSfiMnwjuNRsAQ8dxeKPBQpQff<br>
                <i class="fa-solid fa-robot"></i> ⤵ Pepecoin deposit confirmed
            </p>
        </div>

        <div id="reddit" class="bots-guide">
        <h1>Reddit bot</h1>
            <h4>Withdrawing</h4>
            <p>Private message <a href="https://www.reddit.com/message/compose/?to=pepetipbot" target="_blank">pepetipbot</a> and follow steps like in sample conversation:<br><br>
                <strong>Subject:</strong> withdraw<br>
                <strong>Message:</strong> withdraw Pudye4nXpSfiMnwjuNRsAQ8dxeKPBQpQff all PEPE
            </p>
            <h4>Depositing</h4>
            <p>Private message <a href="https://www.reddit.com/message/compose/?to=pepetipbot" target="_blank">pepetipbot</a> and follow steps like in sample conversation:<br><br>
                <strong>Subject:</strong> info<br>
                <strong>Message:</strong> info<br>
                <br>
                Bot will then send you deposit addres
            </p>
        </div>

        <script>
            function showGuide(guideId) {
                document.querySelectorAll('.bots-guide').forEach(function (guide) {
                    guide.style.display = 'none';
                });

                document.getElementById(guideId).style.display = 'block';
            }
        </script>
</body>