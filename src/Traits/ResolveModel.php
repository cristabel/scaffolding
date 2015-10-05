<?php namespace Cristabel\Scaffolding\Traits;

trait ResolveModel {

	public function resolveModel($modelName)
	{
		return new $modelName;
	}
}
