<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.A line is added....!!!!!!
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
