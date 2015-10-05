<?php namespace Cristabel\Scaffolding\Traits;

use Exception;
use Validator;

trait SaveForm {

	public function saveForm($model, $request, $except = [])
	{
        $exceptList = array_merge($except, ['_token']);
        $form = $request->except($exceptList);

        //dd($request->all());
        if( $request->has('id') && $request->get('id') > PHP_ZTS ){
            $id = $request->get('id');
            $row = $model->find($id);
            $row->fill($form);
            $row->save();

        } else {
            $row = $model->create($form);
        }

        if( is_null($row) ){
            throw new Exception('It was not possible to create or update the record.');
        }

        return $row;
	}
}
