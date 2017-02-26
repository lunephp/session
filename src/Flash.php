<?php


namespace Lune\Session;


use Lune\Variables\HasVariablesTrait;

class Flash implements SessionInterface
{
    use HasVariablesTrait;

    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var Session
     */
    private $read;


    public function __construct(Manager $manager, string $key = '_flash')
    {
        $this->manager = $manager;
        $this->read = $this->manager->get($key);
    }

    public function __destruct()
    {
        $this->persist();
    }

    public function persist()
    {
        $this->read->setVariables($this->getVariables());
        $this->read->__destruct();
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
        return $this->read->has($key);
    }

    public function get($key, $default = null)
    {
        return $this->read->get($key, $default);
    }

    public function remove($key)
    {
        $this->getVariables()->remove($key);
    }
}