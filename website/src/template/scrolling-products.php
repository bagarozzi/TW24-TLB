
<div class = "container mt-5 pt-3 d-flex justify-content-center align-items-center">
    <?php foreach($templateParams["products"] as $product) :?>
    <a type="button" href="#" class="row col-10 pt-2 col-md-5 card normal-link">
        <img src=<?php $product["immagine"]?> class="card-img-top" alt="">
        <div class="card.body text-start">
            <h5 class="card-title"><?php $product["nome"]?></h5>
            <p class="card-body"><?php $product["prezzo"]?></p>
        </div>
    </a>
    <?php endforeach;?>
</div>

<style>
    .normal-link {
    text-decoration: none;
    color: inherit;
    }

    .normal-link:hover {
        color: inherit;
        text-decoration: none;
    }
</style>