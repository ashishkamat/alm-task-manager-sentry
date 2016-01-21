<?php

require_once 'vendor/raven/raven/lib/Raven/Autoloader.php';
Raven_Autoloader::register();
/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',


));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{


#    $client = new Raven_Client('https://964b2247b759421e99c5194b674e4ab5:e7ee336201d34292802790d99c7df08c@app.getsentry.com/63691');

 #   $handler = new Monolog\Handler\RavenHandler($client);
  #  $handler->setFormatter(new Monolog\Formatter\LineFormatter("%message% %context% %extra%\n"));
   # $monolog = Log::getMonolog();
#$monolog->pushHandler($handler);

	Log::error($exception);
	Log::debug('Here is some debug information');
	Log::error('Something went wrong', [
    'user' => ['name' => 'Ashish Kamat', 'email' => 'ashishka@cybage.com']
]);
Log::info('Task completed', [
    'tags' => ['state' => 789]
]);
Log::warning('Something went wrong', [
    'download_size' => 3432425235
]);
Log::debug('Event triggered', [
    'foo' => 'bar',
    'user' => 'Ashish'
]);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';
