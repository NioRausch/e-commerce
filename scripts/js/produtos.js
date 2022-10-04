function numberWithCommas(x) {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return parts.join(",");
}

function generateStars(value) {
  var html = "";
  for (var i = 0; i < parseInt(value); i++) {
    html += `<i class="fa fa-star rating-color"></i>`;
  }

  var star_offset = 0;

  if (!Number.isInteger(value)) {
    star_offset++;
    html += `<i class="fa fa-star-half-o rating-color"></i>`;
  }

  for (var i = parseInt(value); i < 5 - star_offset; i++) {
    html += `<i class="fa fa-star"></i>`;
  }

  return html;
}

function showProduto(produto) {
  $(".produtos").html(`

    <div style="display:flex;">
      <img src="${
        produto["img_caminho"]
      }" class="image-produto" alt="Responsive image">
      <div class="descricaoProduto" style="margin-left:15px">
        <h3 class="tituloProduto"> ${produto["nome"]} </h3>
        <h1 class="precoProduto"> R$ <b style="color:green !important; font-size:xx-large;">${numberWithCommas(
          produto["valor"]
        )}</b> </h1>
        <div class="ratings">
        ${generateStars(parseFloat(produto["avaliacao"]))}
        </div>
        <button id="addCart" style="margin-top:50px;" type="button" class="btn btn-primary">Adicionar ao carrinho</button>
      </div>

    </div>
    <br>
    <br>
    <h1>Descricão</h1>
    <p style="padding:15px;">${produto["descricao"]}</p>
  `);

  $("#addCart").click(function () {
    $.post(
      "./scripts/php/addCart.php",
      {
        addCart: true,
        idProduto: produto["id"],
      },
      function (data) {
        console.log(produto["id"]);
        Swal.fire(
          "Produto adicionado com sucesso!",
          "Redirecionando ao carrinho...",
          "success"
        );
        setTimeout(function () {
          location.href = "?page=cart";
        }, 600);
      }
    );
  });
}

function updateProdutos(idCategoria) {
  $.post(
    "./scripts/php/produtos.php",
    {
      produtos: true,
      idCategoria: idCategoria,
    },
    function (data) {
      var data = JSON.parse(data);

      $(".produtos").html("");

      data.forEach((produto) => {
        produto["preco"] = parseFloat(produto["preco"]);
        $(".produtos").append(
          `
         <div id="produto${
           produto["id"]
         }" style="cursor: pointer;" class="shadow-sm border row produto">
          <img class="produto-imagem" src="${produto["img_caminho"]}" />
          <div class="descricaoProduto">
            <span class="tituloProduto"> ${produto["nome"]} </span>
            <span class="precoProduto"> R$ ${numberWithCommas(
              produto["valor"]
            )}  </span>
            <div class="ratings">
             ${generateStars(parseFloat(produto["avaliacao"]))}
            </div>
          </div>
        </div>
          `
        );
        $("#produto" + produto["id"]).click(function () {
          showProduto(produto);
        });
      });
    }
  );
}

$("#catCel").click(function () {
  updateProdutos("1");
});
$("#catTvs").click(function () {
  updateProdutos("3");
});
$("#catComp").click(function () {
  updateProdutos("2");
});
$("#catEletro").click(function () {
  updateProdutos("4");
});

updateProdutos("1");
