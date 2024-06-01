<?php
include ("../Models/claseDAO.php");

$clase = new claseDAO();
$msg = $clase->agregarClases($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['descripcion']);


?>