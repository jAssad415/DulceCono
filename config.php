<?php
/** Nombre del banco de datos */
define('DB_NAME', 'id7497666_db_crud');

/** Usuario del banco de datos MySQL */
define('DB_USER', 'Sistemas3');

/** Contraseña del banco de datos MySQL */
define('DB_PASSWORD', 'dulce.cono2024');

/** Nombre del host de MySQL */
define('DB_HOST', 'dulcecono.mysql.database.azure.com');

/** Camino absoluto para la carpeta del sistema **/
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Camino en el servidor para el sistema **/
if (!defined('BASEURL')) {
    define('BASEURL', '/SISTEMASIII/');
}

/** Camino del archivo de banco de datos **/
if (!defined('DBAPI')) {
    define('DBAPI', ABSPATH . 'inc/database.php');
}

/** Caminos de los templates de header y footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
?>
