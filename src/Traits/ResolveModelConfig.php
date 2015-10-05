<?php namespace cristabel\Scaffolding\Traits;

use Config;
use Exception;

trait ResolveModelConfig {

	public function resolveModelConfig($modelName)
	{

		$config = Config::get("cristabel.models.{$modelName}");
		if( is_null($config) ) {
			throw new Exception("no configuration is found for model: {$modelName}", 1);
		}

		return $config;
	}
}
