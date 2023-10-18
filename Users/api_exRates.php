<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exchange Rates Converter</title>
    <link rel="stylesheet" href="api_exRates_styles.css" />
    <style>
        @import url('https://fonts.cdnfonts.com/css/butler');
        @import url('https://fonts.cdnfonts.com/css/futura-pt');
     </style>
  </head>

  <body>
    <?php
      include('../navi_bar.php');
    ?>
    <div class="wrapper">
      <div class="api-details">
        <img src="api_exRates_icon.svg" class="api-icon" />
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
      
      <button id="convert-button" style="font-weight: 600;" style="margin-top: 20px;">Convert</button>
      <br>
      <p id="result"></p>
    </div>

    <script src="api_exRates_currency_codes.js"></script>
    <script src="api_exRates_key.js"></script>
    <script src="api_exRates_script.js"></script>
  </body>
</html>
