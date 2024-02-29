// var fieldValue = "oi";
// var msgError = document.createElement("p");
// import Swal from "sweetalert2";

$("#index__btn").click(function(e) {
    var fieldValue = $("#index__value").val();
    var fieldFCurrency = $("#index__fCurrency").val();
    var fieldTCurrency = $("#index__tCurrency").val();;
    $("#alertF").remove();
    $("#alertS").remove();
    $("#alertD").remove();
    $("#alertV").remove();

    if (fieldFCurrency == "0" || fieldTCurrency == "0") {
        e.preventDefault();
        $("#index__btn").before("<div id='alertF' class='alert alert-danger' role='alert'><p>Selecione as moedas</p></div>")
    } else {
        if(fieldFCurrency == fieldTCurrency) {
            e.preventDefault();
            $("#index__btn").before("<div id='alertD' class='alert alert-danger' role='alert'><p>As moedas tem que ser diferentes para realizar a conversão</p></div>")
        } else {
            if(fieldValue <= 0 || fieldValue == "") {
                e.preventDefault();
                $("#index__btn").before("<div id='alertV' class='alert alert-danger' role='alert'><p>Inserir um valor maior que 0</p></div>")
            }
        }
    }


})
