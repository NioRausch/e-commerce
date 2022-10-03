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

$.post(
  "./scripts/php/produtos.php",
  {
    produtos: true,
  },
  function (data) {
    var data = JSON.parse(data);

    data.forEach((produto) => {
      produto["preco"] = parseFloat(produto["preco"]);
      console.log(produto);
      $(".produtos").append(
        `
       <div  class="shadow-sm border row produto">
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
    });
  }
);
