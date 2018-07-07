<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('./lib/functions.php');
include('./lib/conexion.php')
?>


<html>
<title>JUGUETERIA JUBE</title>
    <meta charset="utf-8"/>
<head>
<link href="./imagenes/logo.PNG" rel="icon" type="image/x-icon" />
<link href="./css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="fonts/style.css">

<script>
	function cuenta(){
		document.forms[0].caracteres.value=document.forms[0].comentario.value.length
	}

</script>


<!--MENU CSS-->
<style type="text/css">
*{
margin: 0px;
padding: 0px; 
}

#header{
 margin: auto;
 width: 300px;
 font-family:Arial, Arial, Arial;
}

ul, ol{
list-style:none;
}

.nav > li {
float:left;
}

.nav li a {
background-color: #007FFF;
color: white;
text-decoration:none;
font-weight: 600;
padding:10px 12px;
display:block;
border-radius:0px;
border:0px solid black;
box-shadow: 5px 7px 10px black;
}

.nav li a:hover{
background-color:#557FF6;
    -webkit-transform: scale(1.2);
	-moz-transform: scale(1.2);
}

.nav li ul{
display:none;
position:absolute;
min-width:140px;
}
.nav li a:hover{
background-color:#557FF6;
    -webkit-transform: scale(1.2);
	-moz-transform: scale(1.2);
}
.nav li ul li ul{
right:-140px;
top:0px;
}

</style>

</head>


<body class="body">




<table border="0" class="menu" >
<tr>
<td><a href="todo.php"><img src="./imagenes/logo.PNG" width="200" height="70"  /></a>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<center>
<div id="header">
	<ul class="nav">
		<li><a href="index.php">Inicio</a></li>
		
		<li><a href="todo.php">Catalogo</a>
			<ul>
				<li><a href="Clasica.php">Niños</a></li>
				<li><a href="Experimental.php">Niñas</a></li>
				
			</ul>
		</li>
	
		<li><a href="contacto.php">Contactanos</a></li>
	</ul>
</div>
</center>
</td>



<td width="450">

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="./procesocar/pedidos.php"><img src="./imagenes/carrito.png" width="200" height="60"  /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<td >
	
<?php

	echo 'Bienvenid@: '.$_SESSION['nombre'];
	
	}else{
		echo "";
	}

?>	



<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
	<a href="frm_login.php"><img src="./imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>
	<a href="frm_registro.php"><img src="./imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<?php
} else{
?>
	<br><a href="logout.php"><img src="./imagenes/cerrar.png" style="width: 122px; height: 35px;"/></a>
<?php
}
?>

</td>
</td>






</tr>
</table>


<table class="facebook3">
<tr><td>
<?php
$archivo="contador.txt";
$abre=fopen($archivo, "r");
$total=fread($abre, filesize($archivo));

fclose($abre);
$abre=fopen($archivo,"w");
$total=$total+1;
$grabar=fwrite($abre,$total);

fclose($abre);

echo"<center><font face='Lucida Sans Unicode' size='3' ><b>VISITAS:<br>".$total." </b></font></center>";
?>
</td></tr>
</table>

<div class="social">
		<ul>
			<li><a href="http://www.facebook.com/" target="_blank" class="icon-facebook"></a></li>
			<li><a href="http://www.twitter.com/" target="_blank" class="icon-twitter"></a></li>
			<li><a href="http://www.googleplus.com/" target="_blank" class="icon-google"></a></li>
			<li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
			<li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
		</ul>
	</div>


<center>
<br><br><br><br>
<section class="titulo">
<h1>Comentanos tu opinión o haznos una pregunta</h1>





<br>

<?php if(!isset($_SESSION['nombre'])){
?>

<h3>No puedes comentar si no estas registrado o si no has iniciado sesión, no pierdas el tiempo y hazlo ahora!!!</h3>
<br><a href="frm_registro.php"><img src="./imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<br><br>
</section>
<div class="coments2">
<?php 
}else{
?>

<form action="#" method="post" onsubmit="return validar()">
	<label>Nombre</label>
	<input type="text" name="nombre" ><br>
		<label>Email</label>
	<input type="email" name="email" ><br>
	<label>Asunto</label>
	<input placeholder="Opinión" type="text" name="asunto"><br>

	<br>
	
	Sólo puedes escribir 250 caracteres <br>
	Caracteres escritos: <input type="text" name="caracteres" readonly size="4" /> 
	
	<br>
	<textarea cols="40" rows="5" name="comentario" onKeyDown="cuenta()" onKeyDown="cuenta()" maxlength="250" placeholder="¿Qué opinas de la empresa JUGUETERIA JUBE?"></textarea><br>
	
	<input type="submit" value="Comentar" /> <br>
	
</form>

<?php
	if($_POST){
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
	$asunto=$_POST['asunto'];
	$comentario=$_POST['comentario'];
	$fecha=date('d/m/Y');
	
	$coment = new Comentario();
	$coment->Comentar($nombre, $email, $asunto, $comentario, $fecha);
	}

?>


<?php
}
?>

	</div>
	<br>
	<div class="coments2">
	
		<?php
			$sql= "SELECT * FROM comentarios WHERE status='publicado'";
			$result= mysql_query($sql, Conectar::Conexion());
			while ($row = mysql_fetch_array($result)){
		
		?>
	
	<table width="800">
	<tr><td>
		Fecha: <?php echo $row[5]; ?>
		<h3 style="color: white;"><?php echo $row[1]; ?> dijo:		</h3>
		<h3><textarea border="0" readonly style="overflow:auto; border-style:none; color: white; background-color: #242424;; border-width: 1px;" cols="80" rows="2"  ><?php echo $row[4]; ?> </textarea>	<br><br></h3>
	</td></tr>
	</table>	
		<span style="color: black;" >______________________________________________________________________________________________________________</span>
	 <br><br>
	<?php
	}
	?>

	

</div>
<br><br>
</center>
</body>
</html>


<!--SOLO LO PUEDE VER EL ADMINISTRADOR-->
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){
	
	echo'
<table class="facebook2">
<tr><td>
<h3>Administrador</h3>
<h4>
<a href="./administrador/index.php">INDEX-A</a><br>
<a href="./administrador/productos/mostrar_productos.php">PRODUCTOS-A</a><br>
<a href="./administrador/usuarios/mostrar_usuarios.php">USUARIOS-A</a><br>
<a href="./administrador/comentarios/mostrar_comentario.php">COMENTARIOS-A</a><br>
</h4>
</td></tr>
</table>
';
}}
?>
 <!---------------------------- footer de mi pagina-------------------------- -->
    <footer class="footer">
    <div class="socialf">
        <a class="icon-facebook"></a>
        <a class="icon-twitter"></a>
        <a class="icon-google"></a>
        <a class="icon-instagram"></a>
      <a class="icon-pinterest"></a>
			 <a  class="icon-mail"></a>
        </div>
        <ul class="fmenu">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Support</a></li>
				<li><a href="contacto.php">Blog</a></li>
				<li><a href="login.php">About Us</a></li>
				<li><a href="contacto.php">Contactanos</a></li>
			</ul>
        <br></br>
        <p class="copy">JUBE®    2016   -   TODOS LOS DERECHOS RESERVADOS POR JUGUETERIAS JUBE&copy;</p>
    </footer>

</body>
</html>


