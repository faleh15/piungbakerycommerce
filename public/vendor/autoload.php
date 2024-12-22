<?php
function my_autoloader($class) {
    $file = __DIR__ . '/classes/' . $class . '.index.php'; 
    if (file_exists($file)) {
        include $file;
    }
}

// Register the autoloader
spl_autoload_register('my_autoloader');
?>
