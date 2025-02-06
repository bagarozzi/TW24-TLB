<div class="container-fluid d-flex justify-content-center align-items-center pt-5">
    <div class="card justify-content-center align-items-center shadow h-100 w-100">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="card-body d-flex flex-column justify-content-between">
                <img src="<?php echo $templateParams["product"]["immagine"] ?>" class="card-img-top pt-2 px-2" alt="">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $templateParams["product"]["nome"] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prezzo" class="form-label">Prezzo (€)</label>
                    <input type="number" class="form-control" id="prezzo" name="prezzo" value="<?php echo $templateParams["product"]["prezzo"] ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required><?php echo $templateParams["product"]["descrizione"] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="disponibilita" class="form-label">Disponibilità</label>
                    <input type="number" class="form-control" id="disponibilita" name="disponibilita" value="<?php echo $templateParams["product"]["disponibilita"] ?>" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria" required>
                        <option value="<?php echo $templateParams["product"]["App_nome"]?>" selected><?php echo $templateParams["product"]["App_nome"]?></option>
                        <?php foreach ($templateParams["categories"] as $category): ?>
                            <?php if ($category["name"] != $templateParams["product"]["App_nome"]): ?>
                                <option value="<?php echo $category["name"]; ?>"><?php echo $category["name"]; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="immagine" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="immagine" name="immagine">
                </div>
                <input type="hidden" name="product_id" value="<?php echo $templateParams["product"]["codProdotto"] ?>">
                <div class="d-flex justify-content-between mt-3 w-100">
                    <button type="submit" name="save_changes" value="save" class="btn btn-success w-48">Save Changes</button>
                    <button type="submit" name="delete_product" value="delete" class="btn btn-danger w-48">Delete Product</button>
                </div>
            </div>
        </form>
    </div>
</div>