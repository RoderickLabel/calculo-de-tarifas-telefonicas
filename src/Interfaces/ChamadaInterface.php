<?php

namespace App\Interfaces;

interface ChamadaInterface
{
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