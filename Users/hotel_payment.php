<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $card_information = $_POST["card_information"];
    $expiration_date = $_POST["expiration_date"];
    $cvc = $_POST["cvc"];

    // Define regular expressions for validation
    $card_pattern = "/^[0-9]{16}$/";
    $expiration_pattern = "/^(0[1-9]|1[0-2])\/\d{2}$/";
    $cvc_pattern = "/^[0-9]{3}$/";

    // Perform validation
    $errors = [];

    if (!preg_match($card_pattern, $card_information)) {
        $errors["card_information"] = "Invalid card information format.";
    }

    if (!preg_match($expiration_pattern, $expiration_date)) {
        $errors["expiration_date"] = "Invalid expiration date format (MM/YY).";
    }

    if (!preg_match($cvc_pattern, $cvc)) {
        $errors["cvc"] = "Invalid CVC format.";
    }


    if (empty($errors)) {
        echo "Payment successful!";
    } else {
        foreach ($errors as $field => $error) {
            echo "$field: $error<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</details></title>
</head>
<body>
    <h2>Payment Details</h2>
    <form action="" method="POST">
        <label for="card_information">Card Information</label>
        <input type="text" name="card_information" pattern="[0-9]{16}" placeholder="1234 1234 1234 1234" required>
        <br>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY" required>
        <br>
        <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" placeholder="CVC" required>
        <br>

        <label for="cardholder_name">Cardholder name</label>
        <input type="text" name="cardholder_name" placeholder="Full Name on Card" required>
        <br><br>

        <button type="submit">PAY NOW</button>
    </form>
</body>
</html>