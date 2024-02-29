<?php
require_once "./classes/Currency.php";

$currencies = new Currency();
$lista = $currencies->listar("sigla");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./dist/style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <div id="index__main-container">
        <form action="cad-result.php" class="row g-3 mt-5" method="post" style="text-align: center;">
            <div class="row col-md-6 mb-3" id="index__select">
                <div class="row col-md-6 mb-5">
                    <label for="wallet" class="form-label">De qual moeda deseja converter: </label>
                    <select required name="fromCurrency" class="form-select-sm" id="index__fCurrency" aria-label="Size 3 select example">
                        <option selected value="0">Escolha</option>
                        <?php
                        foreach ($lista as $currency) {
                            echo "<option value=" . $currency['sigla'] . ">" . $currency['sigla'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row col-md-6 mb-5 ml-3">
                    <label for="wallet" class="form-label">Para qual moeda deseja converter: </label>
                    <select name="toCurrency" class="form-select-sm" id="index__tCurrency" aria-label="Size 3 select example">
                        <option selected value="0">Escolha</option>
                        <?php
                        foreach ($lista as $currency) {
                            echo "<option value=" . $currency['sigla'] . ">" . $currency['sigla'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-md-5 mb-3">
                <label for="wallet" class="form-label">Valor: </label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control-sm" name="wallet" id="index__value" step="0.01">
                </div>
            </div>
            <input type="submit" value="Converter" id="index__btn" class="btn btn-primary">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./dist/validation.js" type="module"></script>
</body>

</html>