<div class="container d-flex justify-item-start flex-column pt-5">
<div class="dropdown row col-5 pt-2 ps-5">
  <button class="btn dropdown-toggle rounded-pill border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Ordina per
  </button>
  <ul id= "order-dropdown" class="dropdown-menu">
    <li><button class="dropdown-item" data-sort="nome" data-category="<?php echo $_GET["category"]?>">Nome</button></li>
    <li><button class="dropdown-item" data-sort="prezzo" data-category="<?php echo $_GET["category"]?>">Prezzo</button></li>
  </ul>
</div>
<div id="productsContainer" class = "container pt-3 d-flex flex-column justify-content-center align-items-center">
    <?php foreach($templateParams["products"] as $product) :?>
    <a type="button" href="#" class="row col-10 pt-2 col-md-5 card normal-link mx-auto">
        <img src=<?php echo $product["immagine"]?> class="card-img-top" alt="">
        <div class="card.body text-start">
            <h5 class="card-title"><?php echo $product["nome"]?></h5>
            <p class="card-body"><?php echo $product["prezzo"]?></p>
        </div>
    </a>
    <?php endforeach;?>
</div>
</div>
<script src = "js/products.js"></script>
