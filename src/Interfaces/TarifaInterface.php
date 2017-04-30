<?php  

namespace App\Interfaces;

interface TarifaInterface 
{
	/**
	 * @return int
	 */
	public function getDddOrigem();
	
	/**
	 * @return int
	 */
	public function getDddDestino();
	
	/**
	 * @return float
	 */
	public function getValor();
}