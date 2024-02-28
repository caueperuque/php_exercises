// // var fieldValue = "oi";
// // var msgError = document.createElement("p");


// $("#index__btn").on("click", function(e) {
//     var fieldValue = $("#index__value").val();
//     var fieldFCurrency = $("#index__fCurrency").val();
//     var fieldTCurrency = $("#index__tCurrency").val();
//     $("#index__btn").prev("p").remove();
//     $("#index__value").prev("p").remove();

//     if (fieldFCurrency == "0" || fieldTCurrency == "0") {
//         e.preventDefault();
//         $("#index__btn").before("<p>Selecione as moedas</p>")
//     } else {
//         if(fieldFCurrency == fieldTCurrency) {
//             e.preventDefault();
//             $("#index__btn").before("<p>As moedas tem que ser diferentes para realizar a conversão</p>")
//         } else {
//             if(fieldValue == "" || fieldValue == 0) {
//                 e.preventDefault();
//                 $("#index__value").before("<p>Inserir um valor maior que 0</p>")
//             }
//         }
//     }


// })
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })