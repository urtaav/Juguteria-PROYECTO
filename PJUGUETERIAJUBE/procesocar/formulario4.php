<?php
session_start();
include('../lib/conexion.php');
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>JUGUETERIA JUBE</title>
    <meta charset="utf-8"/>
<head>
<link rel="stylesheet" href="fonts/style.css">
<script type="text/javascript">
function validarForm(formulario) {
  if(formulario.nombreR.value.length==0) { //comprueba que no esté vacío
    formulario.nombreR.focus();   
    alert('No has escrito tu Nombre Real'); 
    return false; //devolvemos el foco
  }
  if(formulario.direccion.value.length==0) { //comprueba que no esté vacío
    formulario.direccion.focus();
    alert('No has escrito tu Direccion');
    return false;
  }
    if(formulario.ciudad.value.length==0) { //comprueba que no esté vacío
    formulario.ciudad.focus();
    alert('No has escrito tu Ciudad');
    return false;
  }
    if(formulario.estado.value.length==0) { //comprueba que no esté vacío
    formulario.estado.focus();
    alert('No has escrito el Estado');
    return false;
  }
   if(formulario.cp.value.length==0) { //comprueba que no esté vacío
    formulario.cp.focus();
    alert('No has escrito el Codigo Postal');
    return false;
  }
   if(formulario.telefono.value.length==0) { //comprueba que no esté vacío
    formulario.telefono.focus();
    alert('No has escrito un Telefono');
    return false;
  }
  return true;
}
</script>

<link href="../imagenes/logo.PNG" rel="icon" type="image/x-icon" />
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />

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

<a href="#ANCLAJE"><img class="anclaje" src="../imagenes/Arriba.png" width="60" height="60" onmouseover="this.src='../imagenes/Arriba2.png';" onmouseout="this.src='../imagenes/Arriba.png';"></a>




<table border="0" class="menu" >
<tr>
<td><a href="../todo.php"><img src="../imagenes/logo.PNG" width="200" height="70"  /></a>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<center>

<div id="header">
	<ul class="nav">
        <li><a href="../index.php">Inicio</a></li>
		<li><a href="../todo.php">Catalogo</a>
			<ul>
				<li><a href="../Clasica.php">Niños</a></li>
				<li><a href="../Experimental.php">Niñas</a></li>
				
			</ul>
		</li>
	
		<li><a href="../contacto.php">Contactanos</a></li>
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
	<a href="../procesocar/pedidos.php"><img src="../imagenes/carrito.png" width="200" height="60"  /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
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
	
	<a href="../frm_login.php"><img src="../imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>
	<a href="../frm_registro.php"><img src="../imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<?php
} else{
?>
	<br><a href="../logout.php"><img src="../imagenes/cerrar.png" style="width: 122px; height: 35px;"/></a>
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
$archivo="../contador.txt";
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
<div class="titulo">
<h1>Bienvenido a tu carrito de compras</h1>
</div>
<div class="titulo">
<img src="../imagenes/paso1.png" width="550" height="80"/>
<br><br>
<h3>Primer paso: Completa este formulario con la información que se te pide a continuación</h3>
<h4>Esto para poder realizar con éxito la compra que vas a realizar</h4>
</div>

<article class="fondoformulario">

	<?php
		$total= $_POST['total'];
		$_SESSION['total']=$total;
	?>
	<br><br>
	
	<form action="paqueteria5.php" method="post" onsubmit="return validarForm(this);">
		<label> Nombre: </label> &nbsp;
		<input type="text" name="name" readonly value="<?php echo $_SESSION['nombre']; ?>" />
		<br><br>
		<label> E-mail: </label> &nbsp;
		<input type="email" name="email" readonly value="<?php echo $_SESSION['email']; ?>" />
		<br><br>
		<label> Nombre Real: </label> &nbsp;
		<input type="text" name="nombreR" value="" />
		<br><br>
		<label> Colonía - Calle - Número: </label> &nbsp;
		<input type="text" name="direccion" value="" />
		<br><br>
		<label> Ciudad: </label> &nbsp;
		<input type="text" name="ciudad" value="" />
		<br><br>
		<label> Estado: </label> &nbsp;
		<input type="text" name="estado" value="" />
		<br><br>
		<label> Código Postal: </label> &nbsp;
		<input type="number" name="cp" value="" />
		<br><br>
		<label> Telefono(s): </label> &nbsp;
		<input type="number" name="telefono" value="" />
		<br><br>
		
		<input type="hidden" name="total" value="<?php echo $total;?>" />
		
		<br><br>
		<input type="image" src="../imagenes/continuar.png" style="width: 135px; height: 40px;" />
	</form>



<br><br><br>
    <p>Toda la información que nos proporciones será completamente confidencial </p>
<a>JUGUETRIA JUBE se compromete a mantener esta información confidencial </a><br></br>
    <a href="#">ver politicas de la empresa</a>

</article>



<br><br><br><br>
</center>


</body>
</html>



<!--SOLO LO PUEDE VER EL ADMINISTRADOR-->
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){
	
	echo'
?>
<table class="facebook2">
<tr><td>
<h3>Administrador</h3>
<h4>
<a href="../administrador/index.php">INDEX-A</a><br>
<a href="../administrador/productos/mostrar_productos.php">PRODUCTOS-A</a><br>
<a href="../administrador/usuarios/mostrar_usuarios.php">USUARIOS-A</a><br>
<a href="../administrador/comentarios/mostrar_comentario.php">COMENTARIOS-A</a><br>
</h4>
</td></tr>
</table>
';
}}
?>