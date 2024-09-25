<style>
    .bottom-nav {
        position: fixed !important;
        bottom: 0 !important;
        width: 100% !important;
        height: 6% !important;
        background-color: #333 !important;
        color: white !important;
        text-align: center !important;
        padding: 10px 0 !important;
        display: none !important;
        /* Hide by default */
        z-index: 1000000 !important;
    }

    .bottom-nav a {
        color: white !important;
        text-decoration: none !important;
        margin: 0 15px !important; /* Add margin to create space between items */
        font-size: 2em !important;
    }

    .bottom-nav a:hover {
        text-decoration: none !important;
    }

    /* Media query for mobile devices */
    @media (max-width: 767px) {
        .bottom-nav {
            display: block !important;
            /* Show on mobile devices */
        }
    }
</style>
</head>

<div class="bottom-nav">
    <a href="?p=game"><i class="fa-solid fa-gamepad"></i></a>
    <a href="?p=rewards"><i class="fa-solid fa-coins"></i></a>
</div>