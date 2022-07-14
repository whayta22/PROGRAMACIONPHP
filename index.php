<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>flor</title>
 <link rel="shortcut icon" href="imagen/eye.ico" />
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/style.css"  >
<img src="imagen/sml.jpg" title="flor (flor@gmail.com)" height="100" 
style="width:100Px; margin-top: 5px;top:20Px;left:10px;background-image; 
position:absolute;Border-radius:1500px;box-shadow:0 0 100px 30px skyblue" >
<style>
body {
        background-image: url("imagen/S");
} 
 </style>
</head>
<style type="text/css">
</style></head>
<body>
        <header>
           <center><br><br> 
		   <TABLE BORDER=5>
            	<TR><TD>
					<h2><MARQUEE><font color="BLACK"><b> ADMINISTRACIÓN DE REGISTRO DE NOTAS</b></font></MARQUEE></h2>
				</TD></TR>
        	</TABLE>
		<fieldset style="width:900px; margin-top: 5px;top:2px; ALIGN="justify"">
	<body>
<FIELDSET>
<LEGEND>******************************************************************</LEGEND>
		<div class="row">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Buscar Alumno: </b><input type="text" name="filter" value=""  id="filter" size="50"  placeholder="Buscar Alumno..." autocomplete="off" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info "/>
					<a data-toggle="modal" class="btn btn-primary" data-target="#nuevo_nota">Agregar Notas</a><br><br>
					</form>
			</div>
</FIELDSET>
</form>
</body>
<fieldset>
 <table border='2' cellpadding='0' cellspacing='10' width='800' bgcolor='BLACK' style="color: black">
 <tr>
 <td width='20' style="font-weight: bold; "><h4><font color="BLUE"><b><center>N°</center></td>
 <td width='160' style="font-weight: bold"><font color="BLUE"><b><center>APELLIDOS Y NOMBRES</center></td>
 <td width='30' style="font-weight: bold"><font color="BLUE"><b><center>T.A.</center></td>
 <td width='30' style="font-weight: bold"><font color="BLUE"><b><center>P.C.</center></td>
  <td width='30' style="font-weight: bold"><font color="BLUE"><b><center>P.E.</center></td>
  <td width='75' style="font-weight: bold"><font color="BLUE"><b><center>PROMEDIO</center></td>
  <td width='75' style="font-weight: bold"><font color="BLUE"><b><center>OBSERVACIÓN</center></td>
  <td width='90' style="font-weight: bold"><font color="BLUE"><b><center>FECHA</center></td>
 <td width='80' style="font-weight: bold"><font color="BLUE"><b><center>ACCIONES</center></td>
</tr>
<?php
			$mysqli = new mysqli("localhost","root","","Sis_notas");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM Notas";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{				
					echo "<tr>";
					echo "<td><center>$fila[0]</td><td><center>$fila[1]</center></td><td><center>$fila[2]</center></td><td><center>$fila[3]</center></td><td><center>$fila[4]</center></td>
					<td><center>$fila[5]</center></td><td><center>$fila[6]</center></td><td><center>$fila[7]</center></td>";	
					echo"<td>";						
				    echo "<br><center><a data-toggle='modal' data-target='#editnota' data-id='".$fila[0] ."'data-alumno='" .$fila[1] ."'
				    data-ta='" .$fila[2] ."'data-pc='".$fila[3] ."'data-pe='".$fila[4] ."'data-promedio='".$fila[5] ."'data-obser='".$fila[6] ."'data-fecha='".$fila[7] ."'class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Modificar</a>";			
					echo "<br><br><a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a><br><br>";		
					echo "</td>";
					echo "</tr>";
									}
				$resultado->close();
			}
		$mysqli->close();			
?>
	        </table>
		</div> 
		<div class="modal" id="nuevo_nota" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <CENTER><h4>NUEVO REGISTRO DE NOTAS</h4> </CENTER>                      
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="GET">   
						
						APELLIDOS Y NOMBRES : <input type="text" name="alumno" Placeholder="INGRESE APELLIDOS Y NOMBRES.." Size="30" Class="Form-Input" Required/>   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br> 
						TAREAS ACADÉMICAS:  <input type="text" name="ta" Placeholder="INGRESE TAREAS ACADÉMICAS.." Size="25" Class="Form-Input" Required/>   &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						PRÁCTICAS CALIFICADAS :  <input type="text" name="pc" Placeholder="INGRESE PRÁCTICAS CALIFICADAS.." Size="25" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						PRUEBAS ESCRITAS :  <input type="text" name="pe" Placeholder="INGRESE PRUEBAS ESCRITAS.." Size="25" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						FECHA :  <input type="date" name="fecha" Placeholder="INGRESE FECHA..." Size="15" Class="Form-Input" Required/> &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br><br>

						<center><input type="submit" class="btn btn-success" value="REGISTRAR"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							 <button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
							 </center>
                       </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal" id="editnota" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>MODIFICAR NOTAS</h4>
                    </div>
                    <div class="modal-body">   

                       <form action="actualiza.php" method="POST">  

                        <input id="id" name="id" type="hidden" ></input> 
                        APELLIDOS Y NOMBRES:<input id="alumno"  name="alumno"  type="text" Size="40" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br> 
						TAREAS A.:  <input        id="ta"  name="ta" type="text" Size="20" Class="Form-Input" Required/>  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						PRÁCTICAS C. :  <input            id="pc"  name="pc"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						PRUEBAS E.. :  <input            id="pe"  name="pe"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						PROMEDIO. :  <input            id="promedio"  name="promedio"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						OBSERVACIÓN :  <input            id="obser"  name="obser"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						FECHA :  <input            id="fecha"  name="fecha" type="text" Size="20" Class="Form-Input" Required/> &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br><br>
                      	
							                    

                      	<center>
                      	<input type="submit" class="btn btn-success" value="REGISTRAR"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						<button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
						</center>

                      </form>

                    </div>
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script>			 
		  $('#editnota').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('alumno')
		  var recipient2 = button.data('ta')
		  var recipient3 = button.data('pc')
		  var recipient4 = button.data('pe')
		  var recipient5 = button.data('promedio')
		  var recipient6 = button.data('obser')
		  var recipient7 = button.data('fecha')
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #alumno').val(recipient1)
		  modal.find('.modal-body #ta').val(recipient2)
		  modal.find('.modal-body #pc').val(recipient3)
		  modal.find('.modal-body #pe').val(recipient4)
		  modal.find('.modal-body #promedio').val(recipient5)
		  modal.find('.modal-body #obser').val(recipient6)
		  modal.find('.modal-body #fecha').val(recipient7)		 
		});
		
	</script>

</body>
	<fieldset  style="width:60Px; height: 400px; margin-top: 50px;top:100Px;left:25px; position:absolute;Border-radius:40px">
    <div class="div-img facebook" >
        <div class="focus"> <a href="https://web.facebook.com/𝐒𝐨𝐟𝐭𝐒𝐲𝐬𝐭𝐞𝐦_𝐒𝐑-102800135293771" target="_blank" > <img class="img" src="imagen/facebook.png" title="Sígueme en Facebook"  height="50" style="width:50Px; margin-top: 0px;top:6Px;left:5px; position:absolute;Border-radius:1000px;box-shadow:0 0 100px Black" /></a></div>
    </div>
    <div class="div-img gmail" >
    <div class="focus"><a href="https://mail.google.com/mail/u/0/" target="_blank" ><img class="img" src="imagen/gmail.png" title="Sígueme en gmail"   height="50" style="width:50Px; margin-top: 15px;top:50Px;left:5px; position:absolute; color:silver "/></a></div>
    </div>

    <div class="div-img yuo" >
    <div class="focus"><a href="https://youtu.be/aBoRDxuV_40" target="_blank"><img class="img" src="imagen/yuo.png"  title="Sígueme en Youtube"   height="50" style="width:50Px; margin-top: 30px;top:100Px;left:5px; position:absolute; color:silver"/></a></div>
    </div>


    <div class="div-img twitter_icon" >
    <div class="focus"><a href="https://twitter.com/login?lang=es" target="_blank"><img class="img" src="imagen/twitter_icon.png" title="Sígueme en Twitter"  height="50" style="width:50Px; margin-top: 100px;top:100Px;left:5px; position:absolute; color:silver "/> </a></div>
    </div>


    <div class="div-img outlook_icon" >
    <div class="focus"><a href="https://www.office.com/?auth=2&home=1" target="_blank"><img class="img" src="imagen/outlook.png" title="Sígueme en outlook" height="50" style="width:50Px; margin-top: 170px;top:100Px;left:5px; position:absolute; color:silver "/> </a></div>
    </div>

    <div class="div-img chrome" >
    <div class="focus"><a href="https://www.google.com.pe" target="_blank"><img class="img" src="imagen/chrom.jpg" title="Google" height="50" style="width:50Px; margin-top: 240px;top:100Px;left:5px; position:absolute; color:silver "/> </a></div>
    </div>


 </fieldset>

	<DIV style="margin-top: 45px;top:85Px;left:2px; position:absolute;" > 
	<p align="left"><font SIZE=3 COLOR=ORANGE face="Bodoni MT" > &nbsp &nbsp &nbsp flor huacho </font></p>
	
	</DIV>

	<DIV style="margin-top: 45px;top:500Px;left:25px; position:absolute;" > 
	<FONT SIZE=3 COLOR=yellow face="Bodoni MT">
	<b>
	<script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script> <div id="reloj"></div>
	</b>
	</DIV>


</fieldset>
</center>
</html>




