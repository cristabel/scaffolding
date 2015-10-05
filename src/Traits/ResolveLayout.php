<?php namespace Cristabel\Scaffolding\Traits;

trait ResolveLayout {

	protected $layout;

	public function render($modelName)
	{

		return view("{$layout}");
	}
}
