<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Il tuo sito</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            div:has(> form){
                z-index: 10;
            }
            .menu-item {
                display: flex;
                align-items: center;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 0.5rem;
                transition: all 0.2s ease-in-out;
                text-decoration: none;
                color: #212529;
            }

            .menu-item:hover {
                background-color: #f8f9fa;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-decoration: none;
            }

            .menu-icon {
                margin-right: 10px;
                font-size: 1.5rem;
                color: #212529;
            }

            .card-body {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 100%;
            }

            .logout-btn-container {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <?php require "header.php";?>
        <main>
            <?php
                if(isset($templateParams["nome"])) {
                    require $templateParams["nome"];
                }
            ?>
        </main>
        <?php require 'footer.php';?>
    </body>    
</html>