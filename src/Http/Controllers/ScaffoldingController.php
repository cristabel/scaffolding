<?php namespace Cristabel\Scaffolding\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Config;
use Datagrid;
use Exception;

use Cristabel\Scaffolding\Traits\ResolveModelConfig;
use Cristabel\Scaffolding\Traits\ResolveModel;
use Cristabel\Scaffolding\Traits\ResolveFormRules;
use Cristabel\Scaffolding\Traits\ValidateForm;
use Cristabel\Scaffolding\Traits\SaveForm;

use Image;

class ScaffoldingController extends Controller {

	use ResolveModelConfig;
	use ResolveModel;
	use ResolveFormRules;
	use ValidateForm;
	use SaveForm;

	public function getIndex($model)
	{
		$config = $this->resolveModelConfig($model);
		$entity = $this->resolveModel($config['model']);

		$params = [
			'config' => $config,
            'model' => $model,
			'datagrid' => Datagrid::make($entity, $config['datagrid'])
		];

		return view('scaffolding::index', $params);
	}

	public function getEdit($model, $id)
	{
		$config = $this->resolveModelConfig($model);
		$entity = $this->resolveModel($config['model']);

		$params = [
			'config' => $config,
            'model' => $model,
            'form' => $config['form'],
            'row' => $entity->find($id)
		];

		return view('scaffolding::form', $params);
	}

	public function postSave($model, Request $request)
	{
		$response = ['error' => false, 'message' => null, 'formErrors' => null];
		try {
			$config = $this->resolveModelConfig($model);
			$entity = $this->resolveModel($config['model']);

			$edit = false;
			if( $request->has('id') ) {
				$edit = true;
			}

			$rules = $this->extractRules($config, $model, $edit);

			$this->validateForm($request->all(), $rules);

			$row = $this->saveForm($entity, $request);

			$response['message'] = "Data of {$model} saved correctly.";
			if( isset($config['form']['messages']['success']) ) {
				$response['message'] = $config['form']['messages']['success'];
			}

		} catch ( Exception $e ) {
			$response['message'] = $e->getMessage();
			$response['formErrors'] = $this->formErrors;
			$response['error'] = true;
			if( isset($config['form']['messages']['failed']) ) {
				$response['message'] = $config['form']['messages']['failed'];
			}
		}

		// Callback Hook:AfterSave
		if( isset($config['hooks']['afterSave']) && is_callable($config['hooks']['afterSave'])) {
			call_user_func($config['hooks']['afterSave'], $row);
		}

		return redirect()->back()
		                 ->with('error', $response['error'])
						 ->with('message', $response['message'])
		                 ->with('formErrors', $response['formErrors']);

	}

	public function test()
	{
    	$img = \Image::make( public_path('/images/berensaat.jpg') )->resize(300, 200);

    	return $img->response('jpg');
	}	

}
