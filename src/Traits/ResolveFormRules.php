<?php namespace Cristabel\Scaffolding\Traits;

use Exception;

trait ResolveFormRules {

	public function extractRules($config = [], $model, $edit = false)
	{
		$rules = [];
		if( !isset( $config['form']) ) {
			throw new Exception("No configuration form.", 1);
		}

		if( $edit == true ){
			$rules['id'] = "required|integer|min:1|exists:{$model},id";
		}

		foreach ( $config['form']['elements'] as $key => $elt ) {
			if( isset($elt['validation']) ) {
				$rules[$key] = $elt['validation'];
			}
		}

		return $rules;
	}
}
