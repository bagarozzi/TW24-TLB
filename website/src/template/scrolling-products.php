<div class="container d-flex justify-item-start flex-column pt-5 px-0">
<div class="dropdown row col-5 col-md-2 pt-2 ps-5">
  <button class="btn dropdown-toggle rounded-pill border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Ordina per
  </button>
  <ul id= "order-dropdown" class="dropdown-menu">
    <li><button id="order-by-name" class="dropdown-item" data-sort="nome ASC" data-category="<?php echo $_GET["category"]?>">Nome</button></li>
    <li><button id="order-by-price" class="dropdown-item" data-sort="prezzo ASC" data-category="<?php echo $_GET["category"]?>">Prezzo</button></li>
  </ul>
</div>
<div id="productsContainer" class = "row container pt-3 mb-4 d-flex flex-wrap justify-content-center align-items-center px-0">
   	<?php 
		require "display-products.php";
   		echo display($templateParams["products"]);
	?>
</div>
</div>
<script src = "js/products.js"></script>
