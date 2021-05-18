<?php

session_start();

use PHPUnit\Framework\TestCase;

require_once './src/classes/session.class.php';

class SessionTest extends TestCase
{
    const TEST_PARAM = 'test_param';
    const TEST_VALUE = 'test_value';

    private $session;

    public function setUp(): void
    {
        $this->session = new Session();
    }

    public function testIsEmpty() : void
    {
        $this->assertEquals(0, count($this->session->getInstance()));
    }

    /**
     * @depends testIsEmpty
     */
    public function testAddData() : void
    {
        $this->session->setData(self::TEST_PARAM, self::TEST_VALUE);
        $this->assertEquals(1, count($this->session->getInstance()));
    }

    /**
     * @depends testAddData
     */
    public function testGetData() : void
    {
        $this->assertEquals(self::TEST_VALUE, $this->session->getValue(self::TEST_PARAM));
    }

    /**
     * @depends testGetData
     */
    public function testGetValueWithDefaultForExistKey() : void
    {
        $this->assertNotEquals('default_value', $this->session->getValueOrDefault(self::TEST_PARAM, 'default_value'), 'Should return real value instead default if key is exists');
    }

    /**
     * @depends testIsEmpty
     */
    public function testGetNotExistData() : void
    {
        $this->assertEquals('default_value', $this->session->getValueOrDefault('fake_param', 'default_value'));
    }

    /**
     * @depends testGetValueWithDefaultForExistKey
     */
    public function testDeleteValue() : void
    {
        $this->session->deleteValue(self::TEST_PARAM);
        $this->assertEquals(0, count($this->session->getInstance()), 'Can\'t delete value by key.');
    }

}
