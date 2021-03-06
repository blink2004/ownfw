<?php

    /**
     * Simple PHP Framework
     *
     * @author Constantine M <blink2004@mail.ru>
     * @copyright Copyright (c) 2021, Constantine M
     * @version 1.0.0
     */

    error_reporting(E_ALL);

    session_start();

    require_once 'vendor/autoload.php';

    /**
     * Подключить все файлы из папки configs. Все файлы должны иметь расширение .php в НИЖНЕМ регистре!!!
     */
    $files = glob('./config/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }

    /**
     * Подключить все файлы из папки src. Все файлы должны иметь расширение .php в НИЖНЕМ регистре!!!
     */
    $files = glob('./src/classes/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }

//    $action = Utils::getValueOrDefault($_GET['act'], 'home');
    $action = isset($_GET['act']) ? strtolower($_GET['act']) : $content = 'home';

    $files = glob('./src/modules/*.{php}', GLOB_BRACE);
    foreach($files as $file) {
        require_once "$file";
    }

    // display
    $smarty->assign('lang', 'ru');
    $smarty->assign('server', $_SERVER['PHP_SELF']);
    $smarty->assign('alert', $session->getValueOrDefault('alert', ''));
    $smarty->assign('name', 'Катруська');
    $smarty->assign('content', $content);
    $smarty->display('index.tpl');

    $keys4delete = array('alert', 'user');
    foreach ($keys4delete as $key)
        $session->deleteValue($key);
