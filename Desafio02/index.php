<?php
$_min = 0;
$_max = 100;
$_num = mt_rand($_min, $_max);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Trabalhando com números aleatórios</h1>
    </header>
    <section>
        <p><?php echo "Gerando um número aleatório entre $_min e $_max..."?></p>
        <p>O valor gerado foi <strong><?php echo $_num ?></strong></p>
        <button onclick="javascript:document.location.reload()">🔃 Gerar outro</button>
    </section>
</body>

</html>