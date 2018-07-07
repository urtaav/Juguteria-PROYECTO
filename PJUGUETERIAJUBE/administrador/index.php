<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../lib/conexion.php');
?>


<html>
<title>JUGUETERIA JUBE</title>
    <meta charset="utf-8"/>
<head>
<link href="../imagenes/logo.PNG" rel="icon" type="image/x-icon" />
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="fonts/style.css">
<!--MENU CSS-->
<style type="text/css">
*{
margin: 0px;
padding: 0px; 
}

#header{
 margin: auto;
 width: 600px;
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





<table border="0" class="menu" >
<tr>

<td><td>
<center>

<div id="header">
	<ul class="nav">
	<!---->	<li><a href="index.php">Inicio</a> <!--administrador-->
			<ul><a href="../index.php">Index del admi</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="./productos/mostrar_productos.php">Productos-A</a>
			<ul>
				
				<li><a href="../Clasica.php">Niños</a></li>
				<li><a href="../Experimental.php">Niñas</a></li>
				<li><a href="../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="./usuarios/mostrar_usuarios.php">Users-A</a>
		</li>
	<!---->	<li><a href="./comentarios/mostrar_comentario.php">Comentarios-A</a>
			<ul><a href="../contacto.php">Comentarios</a></ul> 
		</li>	
			
			</ul>
</div>
</td>



<td width="450">
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){

?>
<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>

	
<?php

	echo 'Bienvenid@: '.$_SESSION['nombre'];
	
	}else{
		echo "";
	}

?>	



<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
	<a href="../frm_login.php"><img src="../imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>
	<a href="../frm_registro.php"><img src="../imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<?php
} else{
?>
	<br><a href="../logout.php"><img src="../imagenes/cerrar.png" style="width: 122px; height: 35px;"/></a>
<?php
}
?>
<?php
}else{

	echo '<script type="text/javascript">
	alert("No tienes los suficientes privilegios para estar aquí");
	window.location.href="../index.php";
	</script>';

}


}else{
	echo '<script type="text/javascript">
	window.location.href="../index.php";
	</script>';

}
?>
</td>
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
<br><br><br><br>
<section class="titulo">
<h1>Hola, Administrador</h1>
</section>


<div class="coments">
<br><br>
<center>

<h2>Selecciona un estado...</h2>
<form action="./lib/estado.php" method="post">
<select name="estado" id="">
		<?php
		$sql = "SELECT * FROM mantenimiento";
		$result = mysql_query($sql,Conectar::conexion());
		while($row = mysql_fetch_array($result)){
		?>
    <option value="<?php echo $row[1];?>" </option>
		<?php
			}
		?>
	
<select/>
		
	<input type="submit" value="Actualizar"/>
	</form>

</center>
<br><br>
</div>



<br><br><br><br>
</center>
</body>
</html>




