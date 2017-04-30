<?php

namespace App;

use App\Interfaces\ChamadaInterface;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class Chamada implements ChamadaInterface
{
	/**
	 * @var string $dddOrigem
	 */
	private $dddOrigem;
	
	/**
	 * @var string $dddDestino
	 */
	private $dddDestino;
	
	/**
	 * @var float $minutos
	 */
	private $minutos;
	
	/**
	 * 
	 * @param int $dddOrigem
	 * @param int $dddDestino
	 * @param float $minutos
	 */
	public function __construct($dddOrigem, $dddDestino, $minutos)
	{
		$this->dddOrigem = $dddOrigem;
		$this->dddDestino = $dddDestino;
		$this->minutos = $minutos;		
	}
	
	/**
	 * @return string
	 */
	public function getDddOrigem() {
		return $this->dddOrigem;
	}
	
	/**
	 * @return string
	 */
	public function getDddDestino() {
		return $this->dddDestino;
	}
	
	/**
	 * @return float
	 */
	public function getMinutos() {
		return $this->minutos;
	}
}