<?php
/**
 * Integration test for ErrorController
 *
 * @author Łukasz Jankowski <mail@lukaszjankowski.info>
 */
class ErrorControllerTest extends ControllerTestCase
{
    public function testInvalidURLShouldBeHandledByErrorController()
    {
        // when
        $this->dispatch('/foo');

        // then
        $this->assertModule('default');
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertResponseCode(404);
        $this->assertQueryContentContains('h2', 'Page not found');
    }

    public function testInvalidModuleShouldRaiseError500()
    {
        $this->dispatch('/default/error/error500');

        $this->assertModule('default');
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertResponseCode(500);
        $this->assertQueryContentContains('h2', 'Application error');
    }

    public function testBacktraceShouldBeDisplayedInDevEnv()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_PROCEDURE_DEVELOPMENT, $this->appConfig);
        $this->bootstrap();
        $this->dispatch('/default/error/error500');

        $this->assertQueryContentContains('h3', 'Exception information:');
        $this->assertQueryContentContains('h3', 'Stack trace:');
    }

    public function testBacktraceShouldNotBeDisplayedInProEnv()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_PROCEDURE_PRODUCTION, $this->appConfig);
        $this->bootstrap();
        $this->dispatch('/default/error/error500');

        $this->assertNotQueryContentContains('h3', 'Exception information:');
        $this->assertNotQueryContentContains('h3', 'Stack trace:');
    }
}
