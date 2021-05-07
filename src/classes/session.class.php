<?php

class Session
{
    public function setData($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function getValue($key) {
        return ( isset($_SESSION[$key]) ) ? $_SESSION[$key] : null;
    }

    public function getValueOrDefault($key, $default = '') {
        return ( $this->getValue($key) ) ? $this->getValue($key) : $default;
    }

    public function deleteValue($key) {
        $_SESSION[$key] = null;
        unset($_SESSION[$key]);
    }

}

$session = new Session();
