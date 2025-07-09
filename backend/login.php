<?php 


$user = $_POST["user"];
$password = $_POST["password"];
if ($user == "FranciscoLatino01" and $password == "latinoto2025*99") {
    header("Location: panel_administrador.html");
}else
{
     header("Location: ../index.html");
     die();
}


?>