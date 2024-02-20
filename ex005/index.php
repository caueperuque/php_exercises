<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Diferenças entre formatos de string</h1>
    <?php 
        $name = "Cauê";
        const CONSTANTE = "constante";
        echo 'Olá $name, com single quote. ';
        echo "Olá $name, com double quote. ";
        echo "Isso é uma " . CONSTANTE . " ";

        // QUEBRA DE LINHA E TABULAÇÃO NÃO FUNCIONA EM HTML
        echo "Testando \"o teste\". ";
        echo "Testando \n\t\t quebra de linha";
    ?>
</body>
</html>