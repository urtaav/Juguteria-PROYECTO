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


<td><h2>Bienvenid@ Administrador</h2>



<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">Index-A</a> <!--administrador-->
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
		<li><a href="trans.tapia_1020@hotmail.com" class="icon-mail"></a></li>
		</ul>
	</div>
<center>
<br><br><br><br><br><br><br>
<section class="titulo">
<h1>Agregar producto</h1>
<br>
<form action="agregar_productos.php" method="post" enctype="multipart/form-data" onsubmit="return validar()">
	<label for=""> Portada </label>
	<br>
	<input type="file" name="portada" />
	<br><br>
	<label for=""> Nombre </label>
	<br>
	<input type="text" name="nombreP">
	<br><br>
	<label for=""> Descripcion </label>
	<br>
	<input type="text" name="descripcion">
	<br><br>
	<label for=""> Precio </label>
	<br>
	<input type="number" name="precio">
	<br><br>
	<label for=""> Stock </label>
	<br>
	<input type="number" name="stock" min="0"  required />
	<br><br>
	<label for=""> Fecha </label>
	<br>
	<input type="text" name="fecha" value="<?php echo date('d/M/Y'); ?>" readonly />
	<br><br>
	<label for=""> Status </label>
	<br>
	<select name="status">
	<option>publicado</option>
	<option>despublicado</option>
	</select>
	<br><br>
	
	<label for=""> Categoria </label>
		<select name="categoria">
		<option value=""> Seleccione una Categoria...</option>
		
		<?php
		$sql = "SELECT * FROM categorias";
		$result = mysql_query($sql, Conectar::Conexion());
		while($row = mysql_fetch_array($result)){
		
		?>
		<option value="<?php echo $row[1];?>">  <?php echo $row[1];?></option>
		
		
		<?php
		}
		?>
		</select>
		
	<br><br>
	<input type="submit" value="Agregar producto" />
	
</form>

</section>


<?php

	if($_POST){
	if($_FILES['portada']['type'] == 'image/jpg' || $_FILES['portada']['type'] == 'image/jpeg' || $_FILES['portada']['type'] == 'image/png' ){
		if($_FILES['portada']['size'] <= 512000){
		
		$rutaServidor = 'images';
		$rutaTemporal = $_FILES['portada']['tmp_name'];
		$nombreImagen = $_FILES['portada']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		
		move_uploaded_file($rutaTemporal, $rutaDestino);
		
		
		$nombreP = $_POST['nombreP'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$fecha = $_POST['fecha'];
		$categoria = $_POST['categoria'];
		$status = $_POST['status'];
		$agregar = new Producto();
		$agregar->agregar($rutaDestino, $nombreP, $descripcion, $precio, $stock, $fecha, $categoria, $status);
		}else{
		echo'<script type="text/javascript">
		alert("Solo se admiten imagenes de 0.5 Mbytes o inferiores a ese tamaño");
		</script>';
		}
	
	
	}else{
	echo'<script type="text/javascript">
	alert("Solo se admiten imagenes jpg o png, vuelva a intentarlo");
	</script>';
	}
	}
	
?>


</center>
</body>
</html>




