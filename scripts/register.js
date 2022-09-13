$("#ErroSenha").hide();

function submit(event, form) {
  $("#ErroSenha").hide();

  event.preventDefault();
  event.stopPropagation();

  var email = $("#email").val();
  var nome = $("#nome").val();
  var senha = $("#senha").val();
  var senha2 = $("#senha2").val();

  if (senha != senha2) {
    $("#senha2").get(0).setCustomValidity("As senhas não coiencidem");
    $("#ErroSenha").show();
  } else if (form.checkValidity()) {
    $("#senha2").get(0).setCustomValidity("");

    $.post(
      "?page=register",
      {
        registrar: true,
        email: email,
        nome: nome,
        senha: senha,
      },
      function (data) {
        Swal.fire(
          "Registrado com sucesso",
          "Agora você podera se logar.",
          "success"
        );

        $("body").removeClass("swal2-height-auto");
      }
    );
  }
}

$("#formularioRegister").submit(function (event) {
  submit(event, this);
});
