<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <script>
        function showPaymentStatus() {
            alert("Payment Successful!");
        }
    </script>
</head>
<body>
    <h2>Payment Details</h2>
    <form action="invoice.php" method="POST" onsubmit="showPaymentStatus">
        <label for="card_information">Card Information:</label>
        <input type="text" name="card_information" pattern="[0-9]{16}" placeholder="1234 1234 1234 1234" required>
        <br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY" required>
        <br><br>
        <label for="cvc">CVC:</label>
        <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" placeholder="CVC" required>
        <br><br>

        <label for="cardholder_name">Cardholder name:</label>
        <input type="text" name="cardholder_name" placeholder="Full Name on Card" required>
        <br><br>

        <button type="submit">PAY NOW</button>
    </form>
</body>
</html>