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
define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/toofestival.es/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'toofestival.es');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', ' ;8m@d$+_M02wVp+$kSg]|j8HN%Vbx2]Ng[GAYhUd5uA=eC:LB/|VM@Ui9:inXuY'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'cpa69-P5SJtMWscAI?[cj<o-0|gvj4}a}8xlUnWvq(~_x$?b(l?vRn.KCUj=}nU)'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '*<(re&OO$BhdJD:qs+!.cfs+UFlpL^gk F~DNL/#F!)qlSJo6@x]NA*?t>|v Lq['); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'zF,}/vgR56hn9|`Zyk}pv+z~R5Mk0:yg[ KNg=ww3]BW-{/fInyj=We^05XA:B6!'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '/AS|uM6Ck+,g%Cy:T2I7%=GDVdOf9jO58d4~<=/uj%MLHd~rQ}BFMvfMsX/-lp(9'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'aL^vyzKwT$<H+[2{+m%w4lCl|hd}PKj#XTGyk:PABRlJ>4SM|_5v!p1?`f<3/u k'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '!?B-,$v[,qA/iGZe%E_K1H%9K-;x&HNI-F)`0013+#yrYCf&5MQjMhQm@BF0S)92'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'D:R4VL/cY1q+Pzh+R-PTq(I]`;}A-$l|/oj81t:!!4Ivrha`=#0hf<psz~skT|Sr'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'tf_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);
define('JETPACK_DEV_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** define upload folder **/
define('UPLOADS', 'media');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

