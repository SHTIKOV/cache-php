<?php declare (strict_types = 1);

spl_autoload_register(function ($className) {
    if (false === strpos($className, 'Shtikov')) {
        return;
    }

    if ($className === 'Shtikov\CachePHP') {
        $className = str_replace('Shtikov', './src', $className);
    } else {
        $className = str_replace('Shtikov\CachePHP', './src', $className);
    }
    $className = str_replace('\\', '/', $className);
    include $className . '.php';
});