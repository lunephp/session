<?php


namespace Lune\Session;


interface SessionInterface
{
    public function clear();

    public function set($key, $value = null);

    public function has($key):bool;

    public function get($key, $default = null);

    public function remove($key);
}