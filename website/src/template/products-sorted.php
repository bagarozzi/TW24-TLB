<?php
require "../bootstrap.php";
if(isset($_GET["category"])) {
    $category = $_GET["category"];
}
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "nome"; // Ordine predefinito

// Recupera i prodotti ordinati dal database
if($sort == "nessuno") {
    $products = $dbh->getProductsByCategory($category);
} else {
    $products = $dbh->getProductsSorted($category, $sort);
}

// Genera l'HTML dei prodotti
foreach($products as $product) {
    echo '<div class="col-12 col-md-5">';
    echo '<a type="button" href="#" class="col-10 pt-2 card normal-link mx-auto">';
    echo '<img src="'.$product["immagine"].'" class="card-img-top" alt="">';
    echo '<div class="card.body text-start ps-3">';
    echo '<h5 class="card-title">'.$product["nome"].'</h5>';
    echo '<p class="card-body">'.$product["prezzo"].'</p>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
}
?>