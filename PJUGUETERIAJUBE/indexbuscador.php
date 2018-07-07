<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>JUGUETERIA JUBE</title>
<meta charset="utf-8"/>
	
	<script src="js/jquery.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="css/estilosbuscador.css">
    <link href="./imagenes/logo.PNG" rel="icon" type="image/x-icon" />
</head>
<body>
	<header>
        
		<div class="header-top">
	           <td><a href="todo.php"><img src="./imagenes/logo.PNG" width="200" height="70"  /></a>
</td>
            <div class="navegacion">
     
				<input type="search" placeholder="Buscar . . ." id="inputBusqueda">
			</div>
		</div>
		<div class="search" id="search">
			<table class="search-table" id="searchTable">
				<thead>
					<tr>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="index.php">Inicio</a></td>
					</tr>
					<tr>
						<td><a href="Clasica.php">Niños</a></td></a>
					</tr>
					<tr>
						<td><a href="Experimental.php">Niñas</a></td>
					</tr>
					<tr>
						<td><a href="todo.php">Todo</a></td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</header>
	<div class="social">
		<ul>
			<li><a href="http://www.facebook.com/" target="_blank" class="icon-facebook"></a></li>
			<li><a href="http://www.twitter.com/" target="_blank" class="icon-twitter"></a></li>
			<li><a href="http://www.googleplus.com/" target="_blank" class="icon-google"></a></li>
			<li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
			<li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
		</ul>
	</div>

	<script src="js/buscador.js"></script>
<center>
<br><br><br><br>
<section class="titulo">
   
    <img src="pictures/niñosfelices4.jpg"alt="" style="width: 1200px; height: 500px;"/><!-- imagenesdelslider--> 
</section>
