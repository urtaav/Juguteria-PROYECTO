<?php
session_start();
include('../../lib/conexion.php');
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
 width: auto;
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

<a name="ANCLAJE">ANCLAJE</a>




<table border="0" class="menu">
<tr>

<td width="400" height="60" class="fondoBlanco"><img src="../../imagenes/logo.PNG">
</td>

<td><h2>Bienvenid@ Administrador</h2>


<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Index-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="../productos/mostrar_productos.php">Productos-A</a>
			<ul>
				
				<li><a href="../../Clasica.php">Niños</a></li>
				<li><a href="../../Experimental.php">Niñasl</a></li>
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
		echo "Tu estas en el sitio web de los juguetes mas grande!";
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
			<li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
		</ul>
	</div>


<center>
<br><br><br><br><br><br><br>
<section class="titulo">
<h1>Gestión de usuarios del administrador</h1>




<form action="./agregar_usuario.php" method="post">
<input type="submit" value="Agregar un administrador">
</form>
<br>


<table border="1" align="center" cellspacing="2" cellpadding="2" style="">
<tr>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Avatar</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Nombre</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">E-mail</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Privilegios</th>
	
	<th style="border-color:#4E6FFF;  border-width:1px; ">Editar</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Eliminar</th>
</tr>


<?php
$sql = "SELECT * FROM usuarios";
$result = mysql_query($sql,Conectar::Conexion());
while ($row = mysql_fetch_array($result)){
?>

<tr>
	<td align="middle" style="border-color:#D0142D; border-width:1px;"><img src="<?php echo $row[1]; ?>" width="80" height="80" /></td>
	<td align="middle" style="border-color:#D0142D; border-width:1px;"><?php echo $row[2]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:1px;"><?php echo $row[3]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:1px;"><?php echo $row[5]; ?></td>

	<td style="border-color:#666666; border-width:1px;">
	
	<form action="editar_usuario.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="hidden" name="avatar" value="<?php echo $row[1]; ?>" />
		<input type="hidden" name="name" value="<?php echo $row[2]; ?>" />
		<input type="hidden" name="e_mail" value="<?php echo $row[3]; ?>" />
		<input type="hidden" name="contraseña" value="<?php echo $row[4]; ?>" />
		<input type="hidden" name="tipo" value="<?php echo $row[5]; ?>" />
		<input type="submit" value="Editar">
	</form>
	</td>
	<td style="border-color:#666666; border-width:1px;">
	<form action="eliminar_usuario.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="hidden" name="tipo" value="<?php echo $row[5]; ?>" />
		<input type="submit" value="Eliminar" />
	</form>
	
	</td>


</tr>

<?php
}
?>


</table>
</section>
</center>
</body>
</html>





