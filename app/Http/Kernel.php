<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
	/**
	 * The application's middleware aliases.
	 *
	 * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
	 *
	 * @var array<string, class-string|string>
	 */
	protected $middlewareAliases = [
		'auth' => \App\Http\Middleware\Authenticate::class,
		'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
		'role' => \App\Http\Middleware\CheckRole::class,
		'admin' => \App\Http\Middleware\AdminMiddleware::class,
	];

	/**
	 * Legacy route middleware mapping for compatibility with packages
	 * that still reference $routeMiddleware.
	 *
	 * @var array<string, class-string|string>
	 */
	protected $routeMiddleware = [
		'auth' => \App\Http\Middleware\Authenticate::class,
		'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
		'role' => \App\Http\Middleware\CheckRole::class,
		'admin' => \App\Http\Middleware\AdminMiddleware::class,
	];
}