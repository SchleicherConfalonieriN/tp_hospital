<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form method="POST" action="">
<input type="time" name="fecha">
<input type="submit" name="enviar">
</form>
<?php



if(count($_POST)>0){
$fecha= $_POST['fecha'];



if(strtotime($fecha)){
echo "funciona";
}else{echo "no funciona";}


}




  ?>

</body>
</html>