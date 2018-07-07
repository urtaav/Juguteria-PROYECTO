<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
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

<img src="../../imagenes/">
</td>

<td><h2>Bienvenid@ Administrador</h2>


<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Inicio-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="mostrar_productos.php">Productos-A</a>
			<ul>
				
				<li><a href="../../Clasica.php">Niños</a></li>
				<li><a href="../../Experimental.php">Niñas</a></li>
				<li><a href="../../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="../usuarios/mostrar_usuarios.php">Usuarios-A</a>
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
	
<?php   

	echo 'Bienvenido!!: '.$_SESSION['nombre'];
	
	}else{
		echo "Tu estas en el sitio web de las tangas mas grandes!";
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
<h1>Gestión de productos del administrador</h1>
    <br>









<form action="./agregar_productos.php" method="post">
<input type="submit" value="Agregar un producto">
</form>
<br>


<table border="1" align="center" cellspacing="2" cellpadding="2" style="">
<tr>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Portada</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Nombre</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Descripción</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Precio</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Stock</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Fecha-Publicacion</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Categoría</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Status</th>
	
	<th style="border-color:#4E6FFF;  border-width:1px; ">Publicar</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Editar</th>
	<th style="border-color:#4E6FFF;  border-width:1px; ">Eliminar</th>
</tr>


<?php
$sql = "SELECT * FROM productos";
$result = mysql_query($sql,Conectar::Conexion());
	$num_rows = mysql_num_rows($result);
			if($_POST['search']){
			$categoria_seleccionada = $_POST['search'];
			$sql = "SELECT * FROM productos WHERE categoria = '$categoria_seleccionada'";
			$result = mysql_query($sql, Conectar::Conexion());
			
			$num_rows = mysql_num_rows($result);
			}
			if($num_rows !=0){
			
	while ($row = mysql_fetch_array($result)){
	1
	


?>

<tr>
	<td align="middle" style="border-color:#D0142D; border-width:1px;"><img src="<?php echo $row[1]; ?>" width="80" height="80" /></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[2]; ?></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[3]; ?></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo '$'; echo $row[4]; ?></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[5]; ?></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[6]; ?></td>
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[7]; ?></td>	
	<td align="middle" style="border-color:#000000; border-width:1px;"><?php echo $row[8]; ?></td>	
	
	<td align="middle" style="border-color:#666666; border-width:1px;">
		<form action="lib/aprobar_producto.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
			<input type="submit" value="publicar">
		</form>
		<form action="lib/desaprobar_producto.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
			<input type="submit" value="despublicar">
		</form>
	
	</td>
	
	
	
	<td style="border-color:#666666; border-width:1px;">
	<form action="editar_productos.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="hidden" name="portada" value="<?php echo $row[1]; ?>" />
		<input type="hidden" name="nombreP" value="<?php echo $row[2]; ?>" />
		<input type="hidden" name="descripcion" value="<?php echo $row[3]; ?>" />
		<input type="hidden" name="precio" value="<?php echo $row[4]; ?>" />
		<input type="hidden" name="stock" value="<?php echo $row[5]; ?>" />
		<input type="hidden" name="fecha" value="<?php echo $row[6]; ?>" />
		<input type="hidden" name="categoria" value="<?php echo $row[7]; ?>" />
		<input type="hidden" name="status" value="<?php echo $row[8]; ?>" />
		<input type="submit" value="Editar">
	</form>
	</td>
	
	
	<td style="border-color:#666666; border-width:1px;">
	<form action="eliminar_producto.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="submit" value="Eliminar" />
	</form>
	
	</td>


</tr>

<?php
}
?>


</table>

<?php 
}else{
echo'<p>No se encontrarón productos con esa categoria</p>';
}
?>



</section>










</center>
</body>
</html>




