<?php

    $smarty = new Smarty();
    $smarty->caching = false;
    $smarty->cache_lifetime = 3600;
    $smarty->config_dir = '/var/www/html/ownfw/configs/';
    $smarty->setTemplateDir('/var/www/html/ownfw/templates/');
    $smarty->setCompileDir('/var/www/html/ownfw/templates_c/');
    $smarty->cache_dir = '/var/www/html/ownfw/templates_c/cache/';
    $smarty->error_reporting = E_ALL & ~E_NOTICE;
    //** раскомментируйте следующую строку для отображения отладочной консоли
    //$smarty->debugging = true;