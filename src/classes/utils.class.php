<?php

/**
 * Class Utils - Вспомогательный класс
 */
class Utils {

    public static function getValueOrDefault($var, $default = null) {
        if ( isset($var) && gettype($var)=='string' )
            return $var;
        elseif ( isset($var) )
            return $var;
        else
            return $default;
    }

    public static function clearSessionKeys(Session &$session, array $keys) {
        foreach ($keys as $key) {
            $session->deleteValue($key);
        }
    }

    public static function clearSmartyKeys(Smarty &$smarty, array $keys) {
        foreach ($keys as $key) {
            $smarty->clearAssign($key);
        }
    }

}