<?php


namespace Lune\Session;


use Lune\Session\Storage\SessionStorage;

class Manager
{

    private $storage;

    private $sessions = [];

    public function __construct(StorageInterface $storage = null)
    {
        $this->storage = $storage??new SessionStorage(session_id());
    }

    public function get($name):Session
    {
        if (!array_key_exists($name, $this->sessions)) {
            $this->sessions[$name] = new Session($name, $this->storage);
        }
        return $this->sessions[$name];
    }

    public function clear($name){
        $this->storage->clear($name);
        if (!array_key_exists($name, $this->sessions)) {
            unset($this->sessions[$name]);
        }
    }
}