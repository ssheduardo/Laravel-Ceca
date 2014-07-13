<?php namespace Ubublog\Ceca;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class CecaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ubublog/ceca');
        AliasLoader::getInstance()->alias('Ceca', 'Ubublog\Ceca\Facades\Ceca');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('ceca', 'Ubublog\Ceca\Ceca');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
