<?php

namespace App\Interfaces;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
interface PlanoInterface
{
	/**
	 * 
	 * @param string $titulo
	 * @param int $minutos
	 */
	public function __construct($titulo, $minutos);
	
	/**
	 * @return string
	 */
	public function getTitulo();
	
	/**
	 * @return int
	 */
	public function getMinutos();
}