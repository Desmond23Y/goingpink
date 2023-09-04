<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exchange Rates Converter</title>
    <link rel="stylesheet" href="api_exchange_rates_style.css" />
  </head>

  <body>
    <div class="wrapper">
      <div class="api-details">
        <img src="api-icon.svg" class="api-icon" />
        <br><br>
        <h1 class="api-title">Exchange Rates Converter</h1>
        <br><br>
      </div>
      
      <label for="amount">Amount:</label>
      <input type="number" id="amount" value="1" />
      <div class="dropdowns">
        <select id="from-currency-select"></select>
        <select id="to-currency-select"></select>
      </div>
      
      <button id="convert-button">Convert</button>
      <br>
      <p id="result"></p>
    </div>

    <script src="currency-codes.js"></script>
    <script src="api-key.js"></script>
    <script src="script.js"></script>
  </body>
</html>
