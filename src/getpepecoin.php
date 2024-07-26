<style>
    body {
        height: 100%;
    }
</style>

<body>
    <div class="container mt-5 mb-3">
        <h2>buy</h2>
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
            <h4>Depositing USDT</h4>
            <h4>Buying Pepecoin</h4>
            <h4>Withdrawing Pepecoin</h4>
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