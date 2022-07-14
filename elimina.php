<?php
$mysqli = new mysqli("localhost","root","","Sis_notas");
if (!$mysqli) {
die('No se pudo conectar : ' . mysql_error());
}
$Cod= $_GET['id'];
$sql = "DELETE FROM Notas WHERE id = '$Cod'";
$resultado = $mysqli->query($sql);
if($resultado){
header("Location: index.php");
}else{
echo "Eliminacion no exitosa";
}
?>