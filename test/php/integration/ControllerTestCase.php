<?php
abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
    protected $appConfig;

    public function setUp()
    {
        $this->appConfig = APPLICATION_PATH . 'config/application.ini';
        $this->bootstrap = new Zend_Application(APPLICATION_PROCEDURE, $this->appConfig);

        parent::setUp();
    }

    public function tearDown()
    {
        $this->resetRequest();
        $this->resetResponse();

        parent::tearDown();
    }
}
