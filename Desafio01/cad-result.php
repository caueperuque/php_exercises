<?php 
    if(isset($_POST))
    $_nextValue = $_POST['num'] + 1; 
    $_previousValue = $_POST['num'] - 1; 
    $_num = $_POST['num'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo "O número escolhido foi: $_num" ?></p>
    <p><?php echo "O numero sucessor é: $_nextValue" ?></p>
    <p><?php echo "O número antecessor é: $_previousValue" ?></p>
    <button>
        <a href="index.php">Voltar</a>
    </button>
</body>
</html>