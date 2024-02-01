<?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$database ="db1";

// Create a database connection
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch exchange rate from the database
function getExchangeRate($fromCurrency, $toCurrency, $conn)
{
    $query = "SELECT exchange_rate FROM exchange_rates WHERE from_currency = '$fromCurrency' AND to_currency = '$toCurrency'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("<center><h1><b>ERROR!!<br>Exchange rate not found for the specified currencies.Kindly redirect to previous page.</b></h1></center><br>");
    }

    return $row['exchange_rate'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fromCurrency = $_POST['from_currency'];
    $toCurrency = $_POST['to_currency'];
    $amount = $_POST['amount'];
    if (!ctype_digit($amount)) {
        echo'<script>
        window.location.href = "CC.php";
        alert("Invalid amount format!!Kindly enter the amount only in digits!!")
        </script>';     
    }
    // Fetch exchange rate from the database
    else{
    $exchangeRate = getExchangeRate($fromCurrency, $toCurrency, $conn);

    // Perform currency conversion
    $convertedAmount = $amount * $exchangeRate;
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div id="form">
    <center><h1>CURRENCY CONVERTER</font></h1></center>
    <form method="post">
    <center><label for="amount"><b>Amount:<b></label></center>
       <center> <input type="text" name="amount" id="amount" required></center><br>
        <center><label for="from_currency"><b>From Currency:<b></label></center>
        <center><select name="from_currency" id="from_currency">
        <option value="AED">AED</option>
        <option value="ARS">ARS</option>
        <option value="BRL">BRL</option> 
        <option value="CNY">CNY</option> 
        <option value="EUR">EUR</option>
        <option value="INR">INR</option>
        <option value="JPY">JPY</option>
        <option value="PKR">PKR</option>
        <option value="RUB">RUB</option>
        <option value="USD">USD</option>
        </select></center><br>

        <center><label for="to_currency"><b>To Currency:<b></label></center>
        <center><select name="to_currency" id="to_currency">
        <option value="AED">AED</option>
        <option value="ARS">ARS</option>
        <option value="BRL">BRL</option> 
        <option value="CNY">CNY</option> 
        <option value="EUR">EUR</option>
        <option value="INR">INR</option>
        <option value="JPY">JPY</option>
        <option value="PKR">PKR</option>
        <option value="RUB">RUB</option>
        <option value="USD">USD</option>
        </select></center><br>
        <center><button type="submit" id="btn">Convert</button></center>

    <?php
    if (isset($convertedAmount)) {
        echo "<font size=5><b><i><p><center>$amount $fromCurrency = $convertedAmount $toCurrency</center></p></i></b></font>";
    }
    ?>
 </form>
 <form action="index.php">
    <br><center><input type="submit" id="btn" value="Close"></center>
    <form>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>

