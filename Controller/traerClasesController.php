<?php
include ("../Models/claseDAO.php");
$clase=new claseDAO();
$clases = $clase->TraerClases();
print_r(json_encode($clases));
?>