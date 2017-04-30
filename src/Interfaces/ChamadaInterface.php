<?php

namespace App\Interfaces;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
interface ChamadaInterface
{
	/**
	 *
	 * @param int $dddOrigem
	 * @param int $dddDestino
	 * @param float $minutos
	 */
	public function __construct($dddOrigem, $dddDestino, $minutos);
	
	/**
	 * @return string
	 */
	public function getDddOrigem();
	
	/**
	 * @return string
	 */
	public function getDddDestino();
	
	/**
	 * @return float
	 */
	public function getMinutos();
}