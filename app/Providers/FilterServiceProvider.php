<?php namespace PHPootball\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'PHPootball\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'PHPootball\Http\Filters\AuthFilter',
		'auth.basic' => 'PHPootball\Http\Filters\BasicAuthFilter',
		'csrf' => 'PHPootball\Http\Filters\CsrfFilter',
		'guest' => 'PHPootball\Http\Filters\GuestFilter',
	];

}