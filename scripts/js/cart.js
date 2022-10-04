function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
  }

function deleteCart(id){
    console.log(id);
    $.post(
        "./scripts/php/removeCart.php",
    {
        removeCart: true,
        idProduto: id
    },
    function (data) {
        updateCart();
    })
}

function updateCart(){

    $.post(
        "./scripts/php/cart.php",
        {
        cart: true
        },
        function (data) {
            var data = JSON.parse(data);
            
            $(".produtos-cart").html("");

            var preco_total = 0;

            data.forEach((produto) => {
                produto["valor"] = parseFloat(produto["valor"]);

                preco_total += produto["valor"];
                id = produto["id"];

                $(".produtos-cart").append(
                `
                    <div class="shadow-sm border row produto-cart">
                        <img class="produto-imagem-cart" src="${produto["img_caminho"]}" />
                        <span class="tituloProduto"> ${produto["nome"]} </span>
                        <span class="precoProduto"> R$ ${numberWithCommas(
                        produto["valor"]
                        )}  
                        <br>
                        <button id="removeCart" type="button" onclick="deleteCart(${id})" value="${id}" class="btn btn-danger btn-sm">Remover</button>
                        </span>
                    </div>
                `
                )
            });

            $(".cart-price").html(`
                <h1>Preço total:</h1>

                <span class="precoProduto"> R$ ${numberWithCommas(
                    preco_total
                  )}  </span>
            `)

           
        }
    );
}

updateCart()
$( document ).ready(function() {
   
})