<style>
    body {
        height: 100%;
    }
</style>

<body>
    <div class="container mt-5 mb-3">
        <h2>Mining</h2>
        <div class="row centered-row mb-3">
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('asic')">Asic Miners <svg
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.79 10.62L3.5 21.9l-1.4-1.4L13.38 9.21zm4.48-2.89l.59-.59l-.79-.79l.64-.64l-1.42-1.42l-.64.64l-.79-.79l-.59.59c-1.74-1.42-3.7-2.56-5.8-3.36l-.83 1.79c1.75.92 3.36 2.03 4.86 3.34L14 7l3 3l.5-.5c1.31 1.5 2.42 3.11 3.34 4.86l1.79-.83c-.8-2.1-1.94-4.06-3.36-5.8">
                        </path>
                    </svg></button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-100 mb-1" onclick="showGuide('pc')">Computers <i
                        class="fa-solid fa-computer"></i></button>
            </div>
        </div>

        <div id="asic" class="guide">
            <h1>Asic Miners</h1>
            <h4>Connecting to pool</h4>
            <p>Pick one of the pools listed on <a href="https://miningpoolstats.stream/pepecoin" target="_blank">Mining
                    Pool Stats</a> and connect your miner to the pool. Pepecoin uses SCRYPT algorithm like Dogecoin and
                Litecoin and can be merge mined alongside many other SCRYPT coins, so you are never directly mining
                Pepecoin, but multiple coins at the same time.<br><br>
                Example how to connect your miner to pool and dashboard where you can see your miner stats:
            </p>
            <div class="row centered-row">
                <div class="col-sm-6 text-center">
                    <a href="/images/mining/1.png" target="_blank">
                        <img src="/images/mining/1.png" class="mb-2">
                    </a>
                </div>
                <div class="col-sm-6 text-center">
                    <a href="/images//mining/2.png" target="_blank">
                        <img src="/images//mining/2.png" class="mb-2">
                    </a>
                </div>
            </div>
            <h4>Renting Miner</h4>
            <p>Renting ASIC (SCRYPT) miner is hit or miss. You will never make profit if you are mining as PPS (Pay Per
                Share). Instead you should mine as PPLNS, Prop or SOLO (PPLNS recommended). As for PPLNS, you should
                rent at least for 6 days.<br>
                <br>
                You can rent miner at <a href="https://www.miningrigrentals.com/rigs/scrypt" target="_blank">Mining
                    Rig Rentals</a> or <a href="https://www.nicehash.com/" target="_blank">NiceHash</a> (each service
                has own way of connecting to pools).
            </p>
        </div>

        <div id="pc" class="guide">
            <h1>PC miners</h1>
            <h4>Mining software</h4>
            <p>It is highly not recommended to mine Pepecoin on computers. You would be competing against ASIC miners,
                what is basically impossible. You should instead mine CPU and GPU coins and lazy mine them to Pepecoin
                (Mining Dutch offers this option).
            </p>
            <h4>GPU Mining</h4>
            <p>For GPU mining use <a href="https://cgminer.info/download/latest/" target="_blank">CG Miner</a> and pick
                your mining pool from <a href="https://miningpoolstats.stream/pepecoin" target="_blank">Mining
                    Pool Stats</a> (recommended Mining Dutch).<br><br>
                Once you have downloaded the miner software, you need to configure it.<br><br>

                Open the "cgminer.conf" file and set the first pool URL to Dutch.
                Set the user as your username to your Mining Dutch login.
                Password is not needed, but it will greatly improve your hashrate. This will basically define the
                difficulty of the work your PC does. Mining Dutch has calculator at this <a
                    href="https://www.mining-dutch.nl/?page=gettingstarted" target="_blank">link</a>, it will provide
                you also
                all neccesarry info you need to put into your mining software.
                Since you are GPU mining, use Kawpow algorithm (this is specific for GPUs which is ASIC
                resistant).<br><br>
                Next up is the intensity, which affects, how intensively your GPU gets new work. Maximum recommended
                amount is
                13.
                Also important is to set the shaders your GPU supports. Look it up in google and change the value
                accordingly.<br><br>

                When mining YOU are responsible for taking care of your worker. Check GPU temps and change with your GPU
                driver or utility tools.
                Don't let the temperatures hit critical values (90°C+) as this will fry your GPU in no
                time.
                If the Miner constantly makes your GPU hit the 90's, STOP INSTANTLY to avoid breaking your PC.
            </p>

            <h4>CPU Mining</h4>
            <p>For CPU mining use <a href="https://github.com/xmrig/xmrig/releases" target="_blank">XMRIG</a> and pick
                your mining pool from <a href="https://miningpoolstats.stream/pepecoin" target="_blank">Mining
                    Pool Stats</a> (recommended Mining Dutch).<br><br>
                Once you have downloaded the miner software, you need to configure it.<br><br>

                Open "config.json" file.
                Check for CPU's "enabled" line to be "true" and check for "opencl" and
                "cuda" 's "enabled" line to be "false".
                Scroll down, enter you algorithm to mine, coin to mine and paste
                Mining Dutch data in like before with GPU mining and save. (Also check on Mining Dutch which difficulty
                you should use, this time you want RandomX algorithm).
            </p>
        </div>
        <?php
        include 'src/donations.php';
        ?>
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