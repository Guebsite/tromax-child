<div id="secondary" class="widget-area <?php apply_filters('tromax_secondary-width','tromax_secondary_class') ?>" role="complementary">
	
	<div id="ayuda">
    <form action="enviar.php" method="post">
    <h3 class="tcontact">¿Como te ayudamos?</h3>
    <input name="nombre" required="" type="text" placeholder="Nombre*" />
    <input name="email" required="" type="email" value="" placeholder="Email*" />
    <input name="Tel" pattern="[0-9]{10}" type="tel" placeholder="Teléfono (Opcional) 10 dígitos" />
    
    <select name="quiero">
        <option value="" selected>-- Elija una opción -- </option>
        <option value="Casa">Casa</option>
        <option value="Oficina">Oficina</option>
        <option value="Bodega">Bodega</option>
        <option value="Departamento">Departamento</option>
        <option value="Local Comercial">Local Comercial</option>
        <option value="Terreno">Terreno</option>
        <option value="Otro">Otro</option>
    </select>
    
    <textarea name="mensaje" required="" placeholder="Mensaje*"></textarea>
    <input id="boton" type="submit" value="Enviar" />

    </form>

</div>
	
	
	
	
</div><!-- #secondary -->

