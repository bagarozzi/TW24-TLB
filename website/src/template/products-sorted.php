<?php
require "../bootstrap.php";
if(isset($_GET["category"])) {
    $category = $_GET["category"];
}
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "nome"; // Ordine predefinito

// Recupera i prodotti ordinati dal database
$products = $dbh->getProductsSorted($category, $sort);

// Genera l'HTML dei prodotti
foreach($products as $product) {
    echo '<a type="button" href="#" class="row col-10 pt-2 col-md-5 card normal-link mx-auto">';
    echo '<img src="'.$product["immagine"].'" class="card-img-top" alt="">';
    echo '<div class="card.body text-start">';
    echo '<h5 class="card-title">'.$product["nome"].'</h5>';
    echo '<p class="card-body">'.$product["prezzo"].'</p>';
    echo '</div>';
    echo '</a>';
}
?>