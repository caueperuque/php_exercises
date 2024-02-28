<?php 
    /**
     Essa função te trás a cotação direta do dolar em real
     Precisa passar o dia inicial da cotação até o dia final
    */
    function cotationDol($initialDate, $endDate) {
        // $initialDate = date("m-d-Y", strtotime("- 7 days"));
        // $endDate = date("m-d-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial='."'$initialDate'"."&@dataFinalCotacao="."'$endDate'".'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
        $dados = json_decode(file_get_contents($url), true);
    
        $cotacao = $dados["value"][0]["cotacaoCompra"];
    
        return $cotacao;
    }

    /**
     Essa função trás a cotação atual de acordo com a Moeda passada
     primeiro parametro é de qual moeda está tentando converter 
     segundo parâmetro é para qual moeda deseja converter
    */ 
    function cotation($fromCurrency, $toCurrency) {
        $formatToCurrency = mb_strtoupper($toCurrency);
        $formatFromCurrency = mb_strtoupper($fromCurrency);

        $url = "https://economia.awesomeapi.com.br/last/$formatFromCurrency-$formatToCurrency";

        $joinCurrencies = "$formatFromCurrency$formatToCurrency";

        $data = json_decode(file_get_contents($url), true);
        $cotacao = $data[$joinCurrencies]['ask'];

        return $cotacao;
    }

    
?>
