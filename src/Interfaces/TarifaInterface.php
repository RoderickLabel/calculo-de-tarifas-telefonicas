<?php  

namespace App\Interfaces;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
interface TarifaInterface 
{
	/**
	 * 
	 * @param int $origem
	 * @param int $destino
	 * @param float $valor
	 */
	public function __construct($origem, $destino, $valor);
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