<?php
session_start();
include('../../lib/conexion.php');
include('lib/functions.php');

if($_POST){
	$if=$_POST['id'];
	$delete = new Comentario();
	$delete->eliminar($id);
}

?>