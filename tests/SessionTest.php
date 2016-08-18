<?php


namespace Lune\Session\Tests;

use Lune\Session\Session;
use PHPUnit_Framework_TestCase;
use Lune\Session\Manager as SessionManager;

class SessionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testCreateSession()
    {
        $manager = new SessionManager();
        $session = $manager->get('test');
        $this->assertInstanceOf(Session::class, $session);
        $session->set('test', 'value');
        $this->assertEquals($manager->get('test')->get('test'), 'value');

    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testRemoveValue()
    {
        $manager = new SessionManager();
        $session = $manager->get('test');
        $session->set('test', 'value');
        $this->assertTrue($session->has('test'));
        $session->remove('test');
        $this->assertFalse($session->has('test'));
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testClear()
    {
        $manager = new SessionManager();
        $session = $manager->get('test');
        $session->set('test', 'value');
        $this->assertTrue($session->has('test'));
        $session->clear();
        $this->assertFalse($session->has('test'));
    }

    /**
     * @test
     * @runInSeparateProcess
     */
    public function testDefaultValue()
    {
        $manager = new SessionManager();
        $session = $manager->get('test');
        $this->assertNull($session->get('not_set'));
        $this->assertEquals($session->get('not_set', 'default'), 'default');
    }


}