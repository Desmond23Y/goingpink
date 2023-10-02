<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</details></title>
</head>
<body>
    <h2>Payment Details</h2>
    <form action="" method="POST">
        <label for="card_information">Card Information</label>
        <input type="text" name="card_information" pattern="[0-9]{16}" placeholdertle="1234 1234 1234 1234" required>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY" required>
        <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" placeholder="CVC" required><br><br>

        <label for="cardholder name">Cardholder name</label>
        <input type="text" name="cardholder name" placeholder="Full Name on Card" required><br><br>

        <button type="submit">PAY NOW</button>
    </form>
</body>
</html>