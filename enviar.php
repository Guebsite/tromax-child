<?php 
$destino = "reynier.nr@gmail.com";
$subject = "www.rentobregon.com.mx";
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$quiero = $_POST["quiero"];
$mensaje = $_POST["mensaje"];
$contenido = "Mensaje_desde" . $subject .  "\nNombre: " . $nombre . "\nEmail: " . $email . "\nTeléfono: " . tel . "\nQuiero: " . quiero . "\nMensaje: " . $mensaje;
mail($destino,"Contacto", $contenido);
header("Location:enviado.php");

?>