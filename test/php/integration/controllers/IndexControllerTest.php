<?php
class IndexControllerTest extends ControllerTestCase
{
    public function testDispatchIndexAction()
    {
        $this->dispatch('/');

        $this->assertModule('default');
        $this->assertController('index');
        $this->assertAction('index');
    }
}
