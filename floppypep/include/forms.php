<script>
    (function () {
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            var walletAddress = document.getElementById('wallet').value;
            var errorAddr = document.getElementById('error-address');
            var errorBal = document.getElementById('error-balance');

            fetch('include/get_balance.php')
                .then(response => response.json())
                .then(data => {
                    var currentPepeBalance = Number(data.currentPepeBalance);

                    if (!walletAddress.startsWith('P')) {
                        errorBal.style.display = 'none';
                        errorAddr.textContent = 'Wrong address format. Wallet address must start with a capital letter "P".';
                        errorAddr.style.display = 'block';
                        return;
                    } else if (currentPepeBalance < 1) {
                        errorAddr.style.display = 'none';
                        errorBal.textContent = 'You can\'t withdraw nothing!';
                        errorBal.style.display = 'block';
                        return;
                    } else {
                        errorBal.style.display = 'none';
                        errorAddr.style.display = 'none';
                        var payoutContent = document.getElementById('payout').textContent;
                        event.target.submit();
                    }
                })
                .catch(error => {
                    console.error('Error fetching balance:', error);
                });
        });
    })();

    document.getElementById('donationAddress').addEventListener('click', function () {
        // Create a temporary input element
        var tempInput = document.createElement('input');
        tempInput.value = 'PeV56xggPVPLVde3D4wQzQXG7Lnsp8wcpJ';
        document.body.appendChild(tempInput);

        // Select the text in the input element
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Remove the temporary input element
        document.body.removeChild(tempInput);

        // Optionally, display a message to the user
        alert('Donation address copied to clipboard!');
    });
    document.getElementById('devAddress').addEventListener('click', function () {
        // Create a temporary input element
        var devInput = document.createElement('input');
        devInput.value = 'PgQN3BqErwVeCpbmAx7gSSJijBdjGL4F2K';
        document.body.appendChild(devInput);

        // Select the text in the input element
        devInput.select();
        devInput.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Remove the temporary input element
        document.body.removeChild(devInput);

        // Optionally, display a message to the user
        alert('Developer address copied to clipboard!');
    });

    // Get the server time for 1:00 am in UTC
    var serverTime = new Date('<?php echo date('Y-m-d H:i:s', strtotime('01:00:00 UTC')); ?>');

    // Get the user's time zone offset in milliseconds
    var userTimezoneOffset = new Date().getTimezoneOffset() * 60000; // Convert minutes to milliseconds

    // Calculate the user's local time by adding the timezone offset
    var localTime = new Date(serverTime.getTime() - userTimezoneOffset);

    // Format the local time to display in the desired format
    var options = { hour: '2-digit', minute: '2-digit', hour12: true };
    var formattedLocalTime = localTime.toLocaleTimeString([], options);

    // Update the paragraph with the local time
    document.getElementById('claim-time').innerHTML = 'Server reboots at ' + formattedLocalTime + '! This means that you will lose your ⱣEPE balance';

    document.getElementById('payout-form').addEventListener('submit', function (event) {
        var walletAddress = document.getElementById('wallet').value;
        if (!walletAddress.startsWith('P')) {
            event.preventDefault(); // Prevent form submission
            document.getElementById('error-message').style.display = 'block'; // Show error message
        } else {
            document.getElementById('error-message').style.display = 'none'; // Hide error message
        }
    });
</script>