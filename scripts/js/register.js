$("#ErroSenha").hide();

async function sha256(message) {
  // encode as UTF-8
  const msgBuffer = new TextEncoder().encode(message);

  // hash the message
  const hashBuffer = await crypto.subtle.digest("SHA-256", msgBuffer);

  // convert ArrayBuffer to Array
  const hashArray = Array.from(new Uint8Array(hashBuffer));

  // convert bytes to hex string
  const hashHex = hashArray
    .map((b) => b.toString(16).padStart(2, "0"))
    .join("");
  return hashHex;
}

async function submit(event, form) {
  $("#ErroSenha").hide();

  event.preventDefault();
  event.stopPropagation();

  var email = $("#email").val();
  var nome = $("#nome").val();
  var senha = $("#senha").val();
  var senha2 = $("#senha2").val();

  if (senha != senha2) {
    $("#ErroSenha").show();
  } else if (form.checkValidity()) {
    $("#loginBtn").prop("disabled", true);
    $.post(
      "./scripts/php/register.php",
      {
        registrar: true,
        nome: nome,
        email: email,
        token: await sha256(senha),
      },
      function (data) {
        if (data == "DONE_SQL")
          Swal.fire(
            "Registrado com sucesso",
            "Agora você podera se logar.",
            "success"
          );
          setTimeout(function(){
            
          }, 5000);
        else if (data == "ERRO: 23000")
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Esse email ja foi usado!",
          });
        else
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Não foi possivel registrar no momento. Tente novamente mais tarde!",
          });

        $("#loginBtn").prop("disabled", false);
        $("body").removeClass("swal2-height-auto");
      }
    );
  }
}

$("#formularioRegister").submit(async function (event) {
  await submit(event, this);
});
