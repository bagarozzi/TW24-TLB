<div class="container d-flex justify-item-start flex-column pt-5 px-0">
<div class="dropdown row col-5 pt-2 ps-5">
  <button class="btn dropdown-toggle rounded-pill border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Ordina per
  </button>
  <ul id= "order-dropdown" class="dropdown-menu">
    <li><button id="order-by-name" class="dropdown-item" data-sort="nome ASC" data-category="<?php echo $_GET["category"]?>">Nome</button></li>
    <li><button id="order-by-price" class="dropdown-item" data-sort="prezzo ASC" data-category="<?php echo $_GET["category"]?>">Prezzo</button></li>
  </ul>
</div>
<div id="productsContainer" class = "row container pt-3 mb-4 d-flex flex-wrap justify-content-center align-items-center px-0">
    <?php foreach($templateParams["products"] as $product) :?>
    <div class="col-12 col-md-5">
    	<a type="button" href="#" class="col-10 pt-2 card normal-link mx-auto">
    	    <img src=<?php echo $product["immagine"]?> class="card-img-top" alt="">
    	    <div class="card.body text-start ps-3">
    	        <h5 class="card-title"><?php echo $product["nome"]?></h5>
    	        <p class="card-body"><?php echo $product["prezzo"]?></p>
    	    </div>
    	</a>
	</div>
    <?php endforeach;?>
</div>
</div>
<script src = "js/products.js"></script>
