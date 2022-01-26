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
                <button type="submit" form="product_form" class="btn secondary">MASS DELETE</button>
            </div>
        </div>
    </header>
    <hr>
    <main>
        <?php include '../app/controllers/read.php';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                echo "{$key} => {$value} ";
            }
            echo var_dump($row[0]);
        }





        // $superResult = $result->fetch(PDO::FETCH_ASSOC);
        // echo $superResult['SKU'];
        // $second = $result->fetch(PDO::FETCH_ASSOC);
        // echo $second['SKU'];
        ?>
    </main>
    <hr>
    <footer>
        <p>Scandiweb Test assigment</p>
    </footer>
</body>

</html>