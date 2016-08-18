<?php


namespace Lune\Session\Storage;


use Lune\Session\StorageInterface;

class SessionStorage implements StorageInterface
{


    public function __construct($session_id = '')
    {

        if (empty(session_id())) {
            session_start();
            if (!empty($session_id)) {
                session_id($session_id);
            }
        }
    }

    public function set($name, $values = [])
    {
        $_SESSION[$name] = $values;
    }

    public function get($name):array
    {
        return array_key_exists($name, $_SESSION) ? $_SESSION[$name] : [];
    }

    public function clear($name)
    {
        if (array_key_exists($name, $_SESSION)) {
            unset($_SESSION[$name]);
        }
    }
}