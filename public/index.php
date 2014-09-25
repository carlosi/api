<?php
// ob_start() activa el almacenamiento del buffer de salida.
// ob_start('limpiar') Nos ayuda a ejecutar la función limpiar() la cual retorna el búfer sin espacios
// al principio ni al final de una respuesta (Esto es para que nuestro XML se muestre de forma correcta)
ob_start('limpiar');
function limpiar($buffer){
    return trim($buffer);
}
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();

// enviar el búfer de salida y deshabilitar el almacenamiento en el mismo
ob_end_flush();
