<?php


namespace Lune\Session;


use Lune\Variables\HasVariablesTrait;

class Session implements SessionInterface
{
    use HasVariablesTrait;
    private $name;

    private $storage;


    public function __construct($name, StorageInterface $storage)
    {
        $this->name = $name;
        $this->storage = $storage;
        $this->setVariables($this->storage->get($this->name));
    }
    
    public function __destruct()
    {
        $this->storage->set($this->name, $this->getVariables()->all());
    }

    public function clear()
    {

        $this->setVariables(null);
    }

    public function set($key, $value = null)
    {
        $this->getVariables()->set($key, $value);
    }

    public function has($key):bool
    {
        return $this->getVariables()->has($key);

    }

    public function get($key, $default = null)
    {
        return $this->getVariables()->get($key, $default);

    }

    public function remove($key)
    {
        $this->getVariables()->remove($key);
    }
}
