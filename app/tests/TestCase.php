<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 *
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface....
	 */
	public function createApplication()
	{
		$unitTesting = true; # Define variable

		$testEnvironment = 'testing'; # Passing value to variable

		return require __DIR__.'/../../bootstrap/start.php';
	}

}
