<?php

use AspectMock\Test as test;

/**
 * @group AspectMock
 */
class AspectMock_Test extends TestCase
{
	protected function tearDown()
	{
		test::clean();
	}

	public function test()
	{
		$this->assertTrue(true);	
	}
}

