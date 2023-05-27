<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UVA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device.width, initial-scale=1.0">
	<title></title>
</head>
<body>
	<form action="#">
		Datos a Cifrar <input type="text" name="t1"><br>
		<input type="submit" value="Cifrar" name="b1"><br>
	</form>
</body>
</html>

<?php

if(isset($_REQUEST["b1"])){
	$datos=$_REQUEST["t1"];

	$publickey=openssl_pkey_get_public(file_get_contents('public_key'));
	openssl_public_encrypt($datos,$datos_cifrados,$publickey);
	echo "Cifradosfd con llave publica <br>".$datos_cifrados."<br>";


	$privatekey=openssl_pkey_get_private(file_get_contents('private_key'));
	openssl_private_decrypt($datos_cifrados,$datos_decifrados,$privatekey);
	echo "Desifrado con llave privada <br>".$datos_decifrados."<br>";

	$privatekey=openssl_pkey_get_private(file_get_contents('private_key'));
	openssl_private_encrypt($datos,$datos_cifrados,$privatekey);
	echo "Cifrado con llave privada <br>".$datos_cifrados."<br>";

	$publickey=openssl_pkey_get_public(file_get_contents('public_key'));
	openssl_public_decrypt($datos_cifrados,$datos_decifrados,$publickey);
	echo "Desifrado con llave publica <br>".$datos_decifrados."<br>";

 		}

?>

