<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <?php
        if(isset($templateParams["styleSheet"])) {
            echo '<link rel="stylesheet" href="' . $templateParams["styleSheet"] . '">';
        }
    ?>
    <link rel="stylesheet" href="./css/account.css">
    <link rel="stylesheet" href="./css/base.css">
    <script src="js/typewriter.js"></script>
    <link rel="icon" type="image/x-icon" href="resources/favicon.ico">
</head>
    <body >
        <?php require 'header.php'; ?>
        <?php require 'account-user.php';?>
        <?php require 'account-admin.php';?>
        <main class="d-flex flex-column">
            <?php
                if(isset($templateParams["nome"])) {
                    require $templateParams["nome"];
                }
            ?>
        </main>
        <?php require 'footer.php'; ?>
        <?php
            if(isset($templateParams["scriptSheet"])) {
                echo '<script src="' . $templateParams["scriptSheet"] . '"></script>';
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
