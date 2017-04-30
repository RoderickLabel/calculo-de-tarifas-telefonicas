<?php

namespace App\Interfaces;

interface PlanoInterface
{
	/**
	 * @return string
	 */
	public function getTitulo();
	
	/**
	 * @return float
	 */
	public function getMinutos();
}