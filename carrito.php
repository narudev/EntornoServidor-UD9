<?php
$$arrCart = array();
$tableHTML = '';
$priceTotal = 0;
$okProduct = 0;

//Vaciamos el cesta
if(isset($_GET['vaciar'])) {
	unset($_COOKIE['cesta']);
	$tableHTML .= 'No hay nada en la cesta';
}

//Accedemos a la cookie para obtener el carrito
if(isset($_COOKIE['cesta'])) {
	$arrCart = unserialize($_COOKIE['cesta']);
}

//Nuevo articulo 
if(isset($_GET['productName']) && isset($_GET['productPrice'])) {

	for($i = 0; $i< sizeof($arrCart); $i++) {
	    if($arrCart[$i]['productName'] == $_GET['productName']) {
		$arrCart[$i]['cantidad'] = $arrCart[$i]['cantidad'] + 1;
		$okProduct = 1;
	    }
	}

	if($okProduct == 0) {
		$iUltimaPos = count($arrCart);
		$arrCart[$iUltimaPos]['productName'] = $_GET['productName'];
		$arrCart[$iUltimaPos]['productPrice'] = $_GET['productPrice'];
		$arrCart[$iUltimaPos]['cantidad'] = $_POST['cantidad'];
        }
}

//COOKIE - Guardamos nuestro array de la cesta en la cookie
$iTemCad = time() + (60 * 60);
setcookie('cesta', serialize($arrCart), $iTemCad);



//Tabla de nuestra cesta
$tableHTML .= '<table class="tableCart">';
$tableHTML .= '<tr>
                    <th>Zapatillas</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
              </tr>';
foreach ($arrCart as $key => $value) {
	$tableHTML .= '<tr>';
	$tableHTML .= '<td>' . $value['productName'] . '</td><td>' . $value['productPrice']*$value['cantidad'] . '</t><td>' . $value['cantidad']  . '</td>';
	$tableHTML .= '</tr>';
	$priceTotal += $value['productPrice']*$value['cantidad'];
}
$tableHTML .= '</table>';

//Precio Total
$tableHTML .= '<div class="showPriceFinal">';
$tableHTML .= 'Precio total: ' . $priceTotal . ' €';
$tableHTML .= '</div>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Carrito</title>
</head>

<body>
    <div class="content">
    <h1>Cesta</h1></a>
        <?php echo $tableHTML; ?>
    </div>
    

    <br>
    <a href="carrito.php?vaciar=1">Vaciar carrito</a>
    
    <a href="index.php">Volver al Menu</a>
</body>

</html>