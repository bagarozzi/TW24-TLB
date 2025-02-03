<div class="container-fluid w-75 my-2">
    <h1>Notifications</h1>
    <div class="row">
        <div class="col-12">
            <?php foreach($templateParams["notifications"] as $item): ?>
            <div class="card w-100 my-2 <?php if($item["letto"] == 1) echo 'bg-light'; ?>">
                <div class="card-body d-flex justify-content-center">
                    <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                        <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["Data"] ?></h6>
                            <h5 class="card-title"><?php echo $item["Titolo"] ?></h5>
                            <p class="card-subtitle mb-2 text-muted"><?php echo $item["Descrizione"] ?></p>
                        </div>
                    </div>
                    <div class="col d-flex flex-row align-items-center justify-content-end">
                        <form method="POST" action="notifications.php" class="d-flex justify-content-between align-items-center me-2">
                            <input type="hidden" name="action" value="read_notification">
                            <input type="hidden" name="notification_id" value="<?php echo $item["id_notifica"]; ?>">
                            <?php if($item["letto"] == 0) {
                                    echo '<button type="submit" name="read" class="btn btn-primary rounded-circle" title="Mark as read"><i class="bi bi-check"></i></button>';
                                }
                                else {
                                    echo '<button type="submit" name="read" class="btn btn-primary rounded-circle" disabled title="Already marked as read"><i class="bi bi-check-all"></i></button>';
                                }
                            ?>
                        </form>
                        <form method="POST" action="notifications.php" class="d-flex justify-content-between align-items-center">
                            <input type="hidden" name="action" value="remove_notification">
                            <input type="hidden" name="notification_id" value="<?php echo $item["id_notifica"]; ?>">
                            <button type="submit" name="delete" class="btn btn-danger rounded-circle" title="Delete"><i class="bi bi-x"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>