<?php

    error_reporting(E_ALL);

    session_start();

    require_once '../vendor/autoload.php';

    /**
     * Подключить все файлы из папки configs. Все файлы должны иметь расширение .php в НИЖНЕМ регистре!!!
     */
    $files = glob('../config/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }

    /**
     * Подключить все файлы из папки src. Все файлы должны иметь расширение .php в НИЖНЕМ регистре!!!
     */
    $files = glob('../src/classes/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }

    $files = glob('../src/modules/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }


/*
//    Console::output('Hi');
//    Console::output_c('white', 'blue', 'Hello World!' . "\r\n");

    // Example of success message
    Console::output_c('white', 'green', 'Dump of DB was saved successfully!' . "\r\n");

    // Example of warning message
    Console::output_c('white', 'yellow', 'Warning! Something wrong!' . "\r\n");

    // Example of error message
    Console::output_c('white', 'red', 'Error! Something wrong!' . "\r\n");

    Console::outputln('');
    Console::outputln('');
    Console::output_c('white', 'green', "                                          \r\n");
    Console::output_c('white', 'green', '    Dump of DB was saved successfully!    ' . "\r\n");
    Console::output_c('white', 'green', "                                          \r\n");*/

    // display
    Console::output_c('white', 'blue', 'Hello World!' . "\r\n");

    $keys4delete = array('alert', 'other_var');
    foreach ($keys4delete as $key)
        $session->deleteValue($key);
