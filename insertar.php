<?php
$mysqli = new mysqli("localhost","root","","Sis_notas");
$alumnonota = $_GET['alumno'];
$tanota = $_GET['ta'];
$pcnota = $_GET['pc'];
$penota = $_GET['pe'];
$fechanota = $_GET['fecha'];

$promedioAUX = ($tanota+$pcnota+$penota)/3;
$promedionota = number_format($promedioAUX, 2,',','');

    if($promedioAUX>11){
        $obsernota = "APROBADO";
    }else{
        $obsernota = "DESAPROBADO";
    }

$sql = "INSERT INTO Notas (alumno,ta,pc,pe,promedio,obser,fecha) VALUES ('$alumnonota', '$tanota','$pcnota','$penota', '$promedionota', '$obsernota', '$fechanota')";
$resultado = $mysqli->query($sql);
if($resultado){
header("Location: index.php");
}else{
echo "Insercion no exitosa";
}
?>