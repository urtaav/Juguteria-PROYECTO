<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecer� error
include('../../lib/conexion.php');
include('./lib/functions.php');
?>


<html>
<title>JUGUETERIA JUBE</title>
<meta charset="utf-8"/>
<head>
<link href="../../imagenes/BURRO.png" rel="icon" type="image/x-icon" />
<link href="../../css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../fonts/style.css">
<!--MENU CSS-->
<style type="text/css">
*{
margin: 0px;
padding: 0px; 
}

#header{
 margin: auto;
 width: 500px;
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

.nav li:hover > ul{
display:block;
}

.nav li ul li ul{
right:-140px;
top:0px;
}

</style>

</head>


<body class="body">
<table border="0" class="menu">
<tr>

<td width="400" class="fondoBlanco"><img src="../../imagenes/banner.jpg">
</td>

<td><h2>Bienvenid@ Administrador</h2>



<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Index-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="../productos/mostrar_productos.php">Productos-A</a>
			<ul>
				
				<li><a href="../../Clasica.php">Ni�os</a></li>
				<li><a href="../../Experimental.php">Ni�as</a></li>
				<li><a href="../../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="../usuarios/mostrar_usuarios.php">Usuarios-A</a>
		</li>
	<!---->	<li><a href="mostrar_comentario.php">Comentarios-A</a>
			<ul><a href="../../contacto.php">Comentarios</a></ul> 
		</li>	
			
			</ul>
</div>

</td>

<td width="200" class="fondoBlanco">



<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){

?>

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
	
<?php

	echo 'Bienvenido!!: '.$_SESSION['nombre'];
	
	}else{
		echo "Tu estas en el sitio web de los juguetes mas bonitos !";
	}

?>	

<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
<?php
} else{
?>
	<br><a href="logout.php">CERRAR SESION</a>
<?php
}
?>

<?php
}else{

	echo '<script type="text/javascript">
	alert("No tienes los suficientes privilegios para estar aqu�");
	window.location.href="../../index.php";
	</script>';

}


}else{
	echo '<script type="text/javascript">
	window.location.href="../../index.php";
	</script>';

}
?>




</td>

</tr>
</table>


<div class="social">
		<ul>
			<li><a href="http://www.facebook.com/" target="_blank" class="icon-facebook"></a></li>
			<li><a href="http://www.twitter.com/" target="_blank" class="icon-twitter"></a></li>
			<li><a href="http://www.googleplus.com/" target="_blank" class="icon-google"></a></li>
			<li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
		<li><a href="trans.tapia_1020@hotmail.com" class="icon-mail"></a></li>
		</ul>
	</div>


<center>
<br><br><br><br><br><br><br>
<section class="titulo">
<h1>Editar comentario</h1>


<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$status  = $_POST['status'];
?>

<form action="actualizar_comentario.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<h3> Recuerda: Cambiar a modo "publicado" en caso de que este el comentario "despublicado"</h3>

<label>Nombre</label>
<input type="text" name="name" value="<?php echo $name; ?>" />
<br>
<label>Email</label>
<input type="email" name="email" value="<?php echo $email; ?>" />
<br>
<label>Asunto</label>
<input type="text" name="asunto" value="<?php echo $asunto; ?>" />
<br>
<label>Comentario</label>
<input type="text" name="comentario" required value="<?php echo $comentario; ?>" />
<br>
<label>Status</label>
<input type="text" name="status" value="<?php echo $status; ?>" />
<br><br>
<input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
<br>

	<br>
	<input type="submit" value="Actualizar comentario" />
<br><br><br>
</form>
</center>
</body>
</html>




