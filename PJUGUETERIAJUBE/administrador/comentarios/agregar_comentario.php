<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../../lib/conexion.php');
include('./lib/functions.php');
?>


<html>
<title>JUGUETERIA JUBE</title>
    <meta charset="utf-8"/>
<head>
<link href="./imagenes/logo.PNG" rel="icon" type="image/x-icon" />
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



<td><h2>Bienvenid@ Administrador</h2>


<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Index-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="../productos/mostrar_productos.php">Productos-A</a>
			<ul>
				
				<li><a href="../../Clasica.php">Niños</a></li>
				<li><a href="../../Experimental.php">Niñas</a></li>
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
		echo "Tu estas en el sitio web de juguetes mas grande!";
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
	alert("No tienes los suficientes privilegios para estar aquí");
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
<h1>Agregar Comentario ADMINISTRADOR</h1>
<br>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validar()">
	<label for=""> Nombre </label>
	<br>
	<input type="text" name="nombre" value="<?php echo $nombre; ?>" readonly />
	<br>
	<label for="">Email </label>
	<br>
	<input type="email" name="email" value="<?php echo $email; ?>" readonly />
	<br>
	<label for=""> Asunto </label>
	<br>
	<input type="text" name="asunto" />
	<br>
	<br>
	<textarea rows="10" name="comentario"></textarea>
	<br><br>
	<label for="">Status</label>
	<select name="status">
	<option selected >publicado</option>
	<option>despublicado</option>
	</select>
	<br><br>
	<input type="submit" value="Agregar comentario" />
	
</form>

</section>


<?php
	if($_POST){
		$nombre=$_POST['nombre'];
		$email=$_POST['email'];
		$asunto=$_POST['asunto'];
		$comentario=$_POST['comentario'];
		$fecha=date('d/m/Y');
		$status=$_POST['status'];
		
		$coment = new Comentario();
		$coment->Comentar($nombre, $email, $asunto, $comentario, $fecha, $status);
	}

?>



</center>
</body>
</html>




