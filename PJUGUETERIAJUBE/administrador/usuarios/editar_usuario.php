<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../../lib/conexion.php');
//aqui no ocupamos el include de functions por que editar viene de la pagina mostrar_usuarios
?>


<html>
<title>JUGUETERIA JUBE</title>
    <meta charset="utf-8"/>
<head>
<link href="../../imagenes/logo.PNG" rel="icon" type="image/x-icon" />
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

<td width="400" class="fondoBlanco"><img src="../../imagenes/logo.PNG">
</td>

<td><h2>Bienvenid@ Administrador</h2>



<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Index-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="../productos/mostrar_productos.php">Productos-A</a>
			<ul>
				<li><a href="../../Clasica.php">Niñas</a></li>
				<li><a href="../../Experimental.php">Niños</a></li>
				<li><a href="../../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="mostrar_usuarios.php">Usuarios-A</a>
		</li>
	<!---->	<li><a href="../comentarios/mostrar_comentario.php">Comentarios-A</a>
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
	<img src="./<?php echo $imagen; ?>" alt="" width="80" height="80" border="3" /><br>
<?php

	echo 'Bienvenido!!: '.$_SESSION['nombre'];
	
	}else{
		echo "Tu estas en el sitio web de los juguEtes maS GRANDE!";
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
<h1>Editar usuario</h1>


<?php
$id = $_POST['id'];
$avatar = $_POST['avatar'];
$name = $_POST['name'];
$e_mail = $_POST['e_mail'];
$contraseña = $_POST['contraseña'];
$tipo = $_POST['tipo'];
?>

<form action="actualizar_usuario.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>" />

<label>Avatar</label><br>
<img src="<?php echo $avatar; ?>" width="120" height="120" /><br>
<input type="hidden" name="avatar" value="<?php echo $avatar; ?>" /><br>
<input type="file" name="avatar2"><br>
<br><br>
<label>Nombre</label>
<input type="text" name="name" value="<?php echo $name; ?>" />
<br>
<label>E-mail</label>
<input type="email" name="e_mail" value="<?php echo $e_mail; ?>" />
<br>
<label>Privilegios</label>
<input type="text" name="tipo" value="<?php echo $tipo; ?>" />
<br>



	<br>
	<input type="submit" value="Actualizar" />

</form>









</center>
</body>
</html>




