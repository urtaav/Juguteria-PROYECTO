<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>JUGUETERIA JUBE</title>
<meta charset="utf-8"/>
<head>
<link href="./imagenes/logo.PNG" rel="icon" type="image/x-icon" />
<link href="./css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="fonts/style.css">
    <script src="js/jquery.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/buscador.js"></script>
<!----------------------MENU CSS--------------------->
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





<table border="0" class="menu" >
<tr>
<td><a href="todo.php"><img src="./imagenes/logo.PNG" width="200" height="70"  /></a>
</td>

<td>
<center>

<div id="header">
	<ul class="nav">
		<li><a href="index.php">Inicio</a>
		<ul>
            <li><a href="indexbuscador.php">Buscar producto</a></li>
            </ul>
            </li>
		<li><a href="todo.php">Catalogo</a>
			<ul>
				<li><a href="Clasica.php">Niños</a></li>
				<li><a href="Experimental.php">Niñas</a></li>
				<li><a href="galeria.php">Galeria</a></li>
               
			</ul>
             
		</li>
	
		<li><a href="contacto.php">Contactanos</a></li>
        
	</ul>
    
</li>
    
    </div>
</center>
</td>

<td width="450">

<?php
	if (isset($_SESSION['nombre'])) {
	
	//para que se muestre el carrito cuando agrega productos el cliente 
?>

	<a href="./procesocar/pedidos.php"><img src="./imagenes/carrito.png" width="200" height="60"  /></a> 
	
	
	
<?php

	echo 'Bienvenid@: '.$_SESSION['nombre'];
	
	}else{
		echo "";
	}

?>	



<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
	<a href="frm_login.php"><img src="./imagenes/ingresar.png" style="width: 130px; height: 30px;"/></a>
	<a href="frm_registro.php"><img src="./imagenes/registrarse.png" style="width: 122px; height: 30px;"/></a>
<?php
} else{
?>
	<br><a href="logout.php"><img src="./imagenes/cerrar.png" style="width: 122px; height: 30px;"/></a>
<?php
}
?>

</td>
</td>






</tr>
</table>


<table class="contactanos">
<tr><td>
<?php
$archivo="contador.txt"; //LLAMA AL ARCHIVO TXT PARA MOSTRAR EL NUMERO de visitas
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
		<li><a href="trans.tapia_1020@hotmail.com" class="icon-mail"></a></li>
		</ul>
	</div>




<center>
<br><br><br><br>
<section class="titulo">
   <img src="./imagenes/navidad.png" style="width: 200px; height: 60px;"/>
<h1>Las mejores Juguetes, a tu alcance.</h1>
</section>


                 
   
         <img src="pictures/niñosfelices.jpg"alt="" style="width: 1200px; height: 500px;"/><!-- imagenesdelslider-->
         
   
<h1>Aqui encontraras lo que tus hijos necesitan para divertirse y aprender.</h1>
    <br></br> 
 <br></br> 
 <br></br> 

         </div>
</center>




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











