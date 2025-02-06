
<?php
function display($products)
{
    $html = "";
    foreach ($products as $product) :
        $html = '<div class="col-12 col-md-6 mb-4 d-flex justify-content-center">
                <a href="single-product.php?id=' . $product["codProdotto"] . '" class="card normal-link d-flex flex-column h-100" style=" width: 80%">
                    <img src="' . $product["immagine"] . '" class="card-img-top mx-auto" alt="' . $product["nome"] . '" style="object-fit: cover; width: 80%; height: 200px;">
                    <div class="card-body text-start d-flex flex-column" style="flex-grow: 1;">
                        <h5 class="card-title">' . $product["nome"] . '</h5>
                        <p class="card-text">' . $product["prezzo"] . '€</p>
                    </div>
                </a>
              </div>';
        echo $html;
    endforeach;
    $_SESSION["previousPage"] = "./products.php?" . http_build_query($_GET);
}
?>