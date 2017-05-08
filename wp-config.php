<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'homerent_property');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'homerent_reynier');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'RnrMgrt8*');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3l4NTv|4p7AWwK4v<i+o86F~{^)(U|_lKRI(FpU8!=-?p^v*+7i:v<mdKa f0#E?');
define('SECURE_AUTH_KEY', '+{=nui-D^r[OOz,r.#ZkL;%Btt+4/G<Uw}bz[E}{SKR4+s#Y!,Ci tU3KNu@6c:y');
define('LOGGED_IN_KEY', 'PHNg`Ke /axnl9.)O%GTI$8E~,J^$Z(l]*jK>K:tyN=SyII(ww=/#(X5/MKJ>3$w');
define('NONCE_KEY', 'a=`~.Y#n@Xp4|Eq|<[4@0:7sJB.Nl N.zNs?aQNM{/c&Fzq6G A/B-1Dt<0VX$R ');
define('AUTH_SALT', '07aO*eH0JjX<x6p6a`t5e{)SB% k0ex_[8!qk,7C4hlPYa$q0Qe8yVq,|*+!3O<b');
define('SECURE_AUTH_SALT', 'Do${v&QteJQ{Pds(QSm{!Js|tx{]nOCEvyztydcqo/Ovou5=~lm$Rpt2Sef9fJbY');
define('LOGGED_IN_SALT', 'FE{(H(JSz?Jr$M%a8zfBkW^D@!w-4/b)j9AhfN%jr%,XSf4sHPyo/%ZJ>D_W7G$3');
define('NONCE_SALT', 'z!2k7Cwd}^dw865]^7a)$A<bXJN^l-D>90q$!KyFU#k4Z)*M3*`07pt6<[p?hh 8');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'av_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'WP_AUTO_UPDATE_CORE', false);

