<div class="container pt-5 px-0">
	<div class="row mb-3 pt-2">
		<div id="filter-container" class="col-md-auto d-flex gap-2 ps-md-5 ps-5">
			<div class="dropdown">
				<button class="btn dropdown-toggle rounded-pill border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Ordina per
				</button>
				<ul id="order-dropdown" class="dropdown-menu">
					<li><button id="order-by-name" class="dropdown-item" data-sort="nome ASC">Nome</button></li>
					<li><button id="order-by-price" class="dropdown-item" data-sort="prezzo ASC">Prezzo</button></li>
				</ul>
			</div>
			<div class="dropdown">
				<button class="btn dropdown-toggle rounded-pill border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Filtri
				</button>
				<div class="dropdown-menu" style="min-width:200px;">
					<div id="dropdown-menu-filter" class="container d-flex flex-column">
						<label for="categoryFilter" class="form-label">Categoria</label>
						<select id="categoryFilter" class="form-select">
							<?php
							foreach ($templateParams["categories"] as $category) :
								echo '<option value="' . $category["name"] . '">' . $category["name"] . '</option>';
							endforeach;
							?>
						</select>
						<label for="maxPrice" class="form-label mt-3">Prezzo massimo:</label>
							<div class="input-group">
								<input type="number" id="maxPrice" class="form-control" min="0" max="70000" step="10" value="70000">
								<span class="input-group-text">€</span>
							</div>
							<label for="priceSlider" class="visually-hidden">Price slider</label>
							<input type="range" id="priceSlider" class="form-range" min="0" max="70000" step="50">
						<button id="applyFilters" class="btn btn-primary w-100 mt-3">Applica</button>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div id="productsContainer" class="row d-flex flex-wrap justify-content-start align-items-stretch px-0 mb-3">
		<?php
		require "display-products.php";
		echo display($templateParams["products"]);
		?>
	</div>
</div>

<script src="js/products.js"></script>