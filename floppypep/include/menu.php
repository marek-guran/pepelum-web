<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 5%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        display: none; /* Hide by default */
        z-index: 1000000;
    }
    .bottom-nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-size: 18px;
    }
    .bottom-nav a:hover {
        text-decoration: underline;
    }
    /* Media query for mobile devices */
    @media (max-width: 767px) {
        .bottom-nav {
            display: block; /* Show on mobile devices */
        }
    }
</style>
</head>

<div class="bottom-nav">
    <a href="?p=game">Game</a>
    <a href="?p=rewards">Rewards</a>
</div>