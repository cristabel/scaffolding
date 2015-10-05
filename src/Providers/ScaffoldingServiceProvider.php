<?php namespace Cristabel\Scaffolding\Providers;

use Illuminate\Support\ServiceProvider;

class ScaffoldingServiceProvider extends ServiceProvider {

	public function register()
	{
        $this->registerViews();
	}

	public function boot()
	{
        $this->publishRoutes();
	}

    protected function publishRoutes()
    {
        include(__DIR__.'/../Http/routes.php');
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'scaffolding');
    }

}
