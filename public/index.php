<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Stylesheet -->
    <link rel="stylesheet" type="text/css" href="public/css/main.css" />
    <script type="text/javascript" src="public/js/index.js"></script>
    <title>Product Page</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>Product Page</h1>
            <div class="btn-cnt">
                <button type="button" onclick="location.href='/addproduct'" class="btn">ADD</button>
                <button type="submit" form="index_form" id="delete-product-btn" class="btn">MASS DELETE</button>
            </div>
        </div>
    </header>
    <hr>
    <main>
        <form action="../app/controllers/delete.php" method="get" class="form-product" id="index_form">
            <?php include '../app/controllers/read.php';
            while ($row = $result->fetch()) :
                $dummy->id = $row->id;
                $dummy->sku = $row->SKU;
                $dummy->name = $row->name;
                $dummy->price = $row->price . '$';
                if ($row->size) {
                    $dummy->info = 'Size: ' . $row->size . 'MB';
                } else if ($row->weight) {
                    $dummy->info = 'Weight: ' . $row->weight . 'KG';
                } else {
                    $dummy->info = 'Dimension: ' . $row->height . 'x' . $row->width . 'x' . $row->length;
                }
            ?>
                <div class="product-container btn">
                    <input type="checkbox" name=<?php echo $dummy->id; ?> class="delete-checkbox">
                    <div class="attributes">
                        <?php
                        unset($dummy->id);
                        foreach ($dummy as $key => $value) :
                        ?>
                            <p>
                                <?php echo $value; ?>
                            </p>

                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endwhile; ?>
        </form>
    </main>
    <hr>
    <footer>
        <p>Scandiweb Test assigment</p>
    </footer>
</body>

</html>