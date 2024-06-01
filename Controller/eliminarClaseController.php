<?php
include ('../Models/claseDAO.php');

$clase = new claseDAO();
$msg = $clase->eliminarClases($_GET['id']);

?>