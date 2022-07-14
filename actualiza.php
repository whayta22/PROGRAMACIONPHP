<?php
$mysqli = new mysqli("localhost","root","","Sis_notas");
$cod = $_POST['id'];
$alumnonota = $_POST['alumno'];
$tanota = $_POST['ta'];
$pcnota = $_POST['pc'];
$penota = $_POST['pe'];
$promedionota = $_POST['promedio'];
$obsernota = $_POST['obser'];
$fechanota = $_POST['fecha'];
$sql = "UPDATE Notas set alumno='$alumnonota',ta='$tanota',pc='$pcnota', pe='$penota', promedio='$promedionota', obser='$obsernota', fecha='$fechanota' where id=$cod";
$resultado = $mysqli->query($sql);
if($resultado){
header("Location: index.php");
}else{
echo "Actualizacion no exitosa";
}
?>