<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Producto 2</title>
</head>
<body>
<div class="content">
        <a href="index.php"><h1>Tienda Running</h1></a>

        <div class="caja">
            <div class="box">
                <img src="img/product2.jpg" alt="Cargando imagen...">
              
            </div>
           
        </div>
        <form method="post" action="carrito.php?productName=New Balance&productPrice=99">
        <div class="productName"><strong>Zapatillas New Balance</strong></div>
            <div class="precio">99 €</div>
            <div class="addCart"><input type="text" name="cantidad" value="1" size="2" />
                <input type="submit" value="Añadir al carro" class="btnAddAction" />
            </div>
        </form>
        <h1>
            <a href="carrito.php">Ver Carrito</a>
        </h1>
    </div>
</body>
</html>