<?php
include ("../Models/claseDAO.php");
$clase=new claseDAO();
$clases = $clase->TraerClase($_GET['id']);
print_r(json_encode($clases));
?>