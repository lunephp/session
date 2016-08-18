<?php


namespace Lune\Session;


interface StorageInterface
{
    public function set($name, $values = []);

    public function get($name):array;

    public function clear($name);

}