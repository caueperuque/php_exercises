<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Exemplo de PHP</h1>
    <?php 
        // Configura TIME ZONE
        date_default_timezone_set("America/Sao_Paulo");
        $teste = "Hoje é dia " . "<span class=teste2>" . date("d/M/Y") . "</span>";
        echo "<p class=teste> $teste </p>";
        echo " e a hora atual é " . date("G:i:s");
    ?>
</body>
</html>