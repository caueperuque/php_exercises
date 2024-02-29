<?php 
    $value = $_POST['valor'] ?? 0;
    $formatValue = number_format($value, 3, ",", ".");
    $splitNum = explode(",", $formatValue);
    $thousands = $splitNum[0];
    $decimals = "0," . $splitNum[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Analisando o número <?php echo $formatValue?> informado pelo usuário:</h1>
    <ul>
        <li>A parte inteira do número é <strong><?php echo $thousands?></strong></li>
        <li>A parte fracionária do número é <strong><?php echo $decimals?></strong></li>
    </ul>
    <button onclick="javascript:history.go(-1)">Voltar</button>
</body>
</html>