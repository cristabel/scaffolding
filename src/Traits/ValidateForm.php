<?php namespace Cristabel\Scaffolding\Traits;

use Exception;
use Validator;

trait ValidateForm {

	protected $formErrors = [];

	public function validateForm($inputs = [], $rules = [])
	{
		$formdata[] = $inputs;
		$first = reset($inputs);
		if( is_array($first) ) {
			$formdata = $inputs;
		}

		foreach( $formdata as $form ){
			$v = Validator::make($form , $rules );
			if( $v->fails() ){
				$this->formErrors = $v->getMessageBag();
				
				throw new Exception("Alguno de los datos enviados son invalidos, verifique por favor.");
			}
		}
	}
}
