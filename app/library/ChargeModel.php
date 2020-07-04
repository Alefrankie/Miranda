<?php

/**
 *Trait for Charge Model
 */
trait ChargeModel
{
	public function chargeModel($model)
	{
		//Charge Model
		require_once '../app/models/' . $model . '.php';
		//Instanciar el modelo
		return new $model();
    }
}