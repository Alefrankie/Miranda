<?php

/**
 *Trait for charge View
 */
trait ChargeView
{
	//Charge View
	public function chargeView($view, $data = []): void
	{
		//Check if file exists
		if (!(file_exists(RUTA_APP. '/views/' . $view . '.php'))) {
			//si el archivo de la vista no existe
			die('La Vista No Existe');
		}
		require_once RUTA_APP. '/views/' . $view . '.php';
    }
}