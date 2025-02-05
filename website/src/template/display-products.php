
<?php
function display($products)
{
    $html = ""; 
    foreach ($products as $product) :
        $html = '<div class="col-12 col-md-6">
                    <a type="button" href="single-product.php?id=' . $product["codProdotto"] . '" class="col-10 pt-2 card normal-link mx-auto">
                        <img src="' . $product["immagine"] . '" class="card-img-top" alt="">
                        <div class="card-body text-start ps-3">
                            <h5 class="card-title">' . $product["nome"] . '</h5>
                            <p class="card-body">' . $product["prezzo"] . '</p>
                        </div>
                    </a>
                  </div>';
        echo $html;
    endforeach;
}
?>