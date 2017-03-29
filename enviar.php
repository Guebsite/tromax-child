<?php 
$destino = "reynier.nr@gmail.com";
$subject = "www.elyfotografia.com.mx";
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$mensaje = $_POST["mensaje"];
$contenido = "Mensaje_desde" . $subject .  "\nNombre: " . $nombre . "\nEmail: " . $email . "\nTeléfono: " . tel . "\nMensaje: " . $mensaje;
mail($destino,"Contacto", $contenido);
header("Location:enviado.html");

?>