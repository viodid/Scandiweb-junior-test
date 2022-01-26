<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Stylesheet -->
    <link rel="stylesheet" type="text/css" href="public/css/main.css" />
    <title>Product Page</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>Product Page</h1>
            <div class="btn-cnt">
                <button type="button" onclick="location.href='/addproduct'" class="btn primary">ADD</button>
                <button type="submit" form="index_form" id="delete-product-btn" class="btn secondary">MASS DELETE</button>
            </div>
        </div>
    </header>
    <hr>
    <main>
        <form action="../app/controllers/delete.php" method="get" class="form-product" id="index_form">
            <?php include '../app/controllers/read.php';
            // Check if any posts
            if ($num > 0) {

                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    // var_dump($row);
            ?>

                    <div class="product-container">
                        <input type="checkbox" name="id1.test" class=".delete-checkbox">
                        <div class="attributes">
                            <?php
                            var_dump($row);
                            ?>
                        </div>
                    </div>

            <?php

                }
            }





            // $superResult = $result->fetch(PDO::FETCH_ASSOC);
            // echo $superResult['SKU'];
            // $second = $result->fetch(PDO::FETCH_ASSOC);
            // echo $second['SKU'];
            ?>
        </form>
    </main>
    <hr>
    <footer>
        <p>Scandiweb Test assigment</p>
    </footer>
</body>

</html>