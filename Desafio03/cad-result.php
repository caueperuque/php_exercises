<?php
include_once "functions.php";
$fromCurrency = $_POST['fromCurrency'];
$toCurrency = $_POST['toCurrency'];
$firstBid = (float) cotation($fromCurrency, $toCurrency);
$secondBid = (float) cotation($toCurrency, $fromCurrency);
?>

<?php
$_wallet = $_POST['wallet'];
if ($firstBid < $secondBid) {
    $conversion = $_wallet / $secondBid;
} else {
    $conversion = $_wallet * $firstBid;
}


$_formatResult = number_format($conversion, 2, ",", ".");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <p><?php echo "$fromCurrency $_wallet equivalem a $toCurrency $_formatResult" ?></p>
    <p><?php echo "<strong>*Cotação fixa de $fromCurrency para $toCurrency ". number_format($firstBid, 2, ",", ".")."</strong>". " informada pela API de cotação do AwesomeAPI" ?></p>
    <button>
        <a href="index.php">Voltar</a>
    </button>
</body>

</html>