<style>
    body {
        height: 100%;
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

        <div id="discord" class="guide">
            <h1>Discord bot</h1>
            <h4>Withdrawing</h4>
            <p>Private message ℙ𝔼ℙ𝔼 𝔻𝕀𝕊ℙ𝔼ℕ𝕊𝔼ℝ (tip.cc) bot and follow steps like in sample conversation:<br><br>
                <i class="fa-solid fa-user user-icon"></i> $withdraw pepe<br>
                <i class="fa-solid fa-robot bot-icon"></i>❔ Enter your Pepecoin (PEPE) destination address<br>
                <i class="fa-solid fa-user user-icon"></i> YOUR-WALLET-ADDRESS<br>
                <i class="fa-solid fa-robot bot-icon"></i>❔ How much Pepecoin (PEPE) do you want to withdraw? You have
                308,387.25850331 PEPE. Reply with all to withdraw all.<br>
                <i class="fa-solid fa-user user-icon"></i> all or for example 300000<br>
                <i class="fa-solid fa-robot bot-icon"></i>Please confirm withdrawal by click approval button<br>
                <i class="fa-solid fa-user user-icon"></i> You should click confirm button<br>
                <i class="fa-solid fa-robot bot-icon"></i>⤴ Pepecoin sent
            </p>
            <h4>Depositing</h4>
            <p>Private message ℙ𝔼ℙ𝔼 𝔻𝕀𝕊ℙ𝔼ℕ𝕊𝔼ℝ (tip.cc) bot and follow steps like in sample conversation:<br><br>
                <i class="fa-solid fa-user user-icon"></i> $deposit pepe<br>
                <i class="fa-solid fa-robot bot-icon"></i>⤵ Deposit Pepecoin. Deposits need at least 10 confirmations to be credited to your account. Your deposit address: YOUR-WALLET-ADDRESS<br>
                <i class="fa-solid fa-robot bot-icon"></i>⤵ Pepecoin deposit confirmed
            </p>
        </div>

        <div id="reddit" class="guide">
        <h1>Reddit bot</h1>
            <h4>Withdrawing</h4>
            <p>Private message <a href="https://www.reddit.com/message/compose/?to=pepetipbot" target="_blank">pepetipbot</a> and follow steps like in sample conversation:<br><br>
                <strong>Subject:</strong> withdraw<br>
                <strong>Message:</strong> withdraw YOUR-WALLET-ADDRESS all PEPE
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
                document.querySelectorAll('.guide').forEach(function (guide) {
                    guide.style.display = 'none';
                });

                document.getElementById(guideId).style.display = 'block';
            }
        </script>
</body>