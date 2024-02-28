<?php 
    require_once "./classes/Currency.php";

    $currencies = new Currency();
    $lista = $currencies->listar("sigla");
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
    <?php include_once "header.php"?>
    <form action="cad-result.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="wallet" class="form-label">Qual moeda deseja converter: </label>
            <select required name="fromCurrency" class="form-select-sm" id="index__fCurrency" aria-label="Size 3 select example">
                <option selected disabled value="0">Escolha</option>
                <?php 
                    foreach($lista as $currency){
                        echo "<option value=".$currency['sigla'].">".$currency['sigla']."</option>";
                    }
                ?>
            </select>
            <div class="invalid-feedback">
            Por favor selecione uma moeda.
            </div>
        </div>
        <div class="mb-3">
            <label for="wallet" class="form-label">Para qual moeda deseja converter: </label>
            <select required name="toCurrency" class="form-select-sm" id="index__tCurrency" aria-label="Size 3 select example">
                <option selected disabled value="0">Escolha</option>
                <?php 
                    foreach($lista as $currency){
                        echo "<option value=".$currency['sigla'].">".$currency['sigla']."</option>";
                    }
                ?>
            </select>
            <div class="invalid-feedback">
            Por favor selecione uma moeda.
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input required type="number" class="form-control-sm" name="wallet" id="index__value" min=1 step="0.01">
        </div>
        <input type="submit" value="Converter" id="index__btn" class="btn btn-primary">
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="dist/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>