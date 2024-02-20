<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Testes de tipos primitivos</h1>
    <?php 
        // 0X = HEXA 0b = binário 0 = octal
        // COERÇÃO (type) value
        $num = (float) 0x1A;
        // echo "O valor da variável é $num do tipo" . var_dump($num);
        var_dump($num);

        // SE DER UM PRINT COM UM TIPO BOOL O TRUE VAI APARECER COMO 1 E O FALSE COMO VAZIO

        class Person {
            private string $name = "Cauê";
        }

        const PERSON = new Person;
        var_dump(PERSON);
    ?>
</body>
</html>