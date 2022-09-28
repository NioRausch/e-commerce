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
  var senha = $("#senha").val();

  if (form.checkValidity()) {
    $("#loginBtn").prop("disabled", true);

    var token = await sha256(senha);

    $.post(
      "./scripts/php/login.php",
      {
        login: true,
        email: email,
        token: token,
      },
      function (data) {
        try {
          var data = JSON.parse(data);

          if (data.status == "SUCCESS") {
            if (typeof Storage !== "undefined") {
              sessionStorage.token = token;
              sessionStorage.nome = data.nome;
            } else {
              // Sorry! No Web Storage support..
            }

            var url = new URL(location.href);

            for (const key of url.searchParams.keys()) {
              url.searchParams.delete(key);
            }

            location.href = url;
          } else if (data.status == "ERROR: NO_USER") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Email ou senha incorretos!",
            });
          }
        } catch (error) {
          console.log(error);
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Não foi possivel registrar no momento. Tente novamente mais tarde!",
          });
        }

        $("#loginBtn").prop("disabled", false);
        $("body").removeClass("swal2-height-auto");
      }
    );
  }
}

$("#formularioLogin").submit(async function (event) {
  await submit(event, this);
});
