<?php 

namespace App\Interfaces;

interface CalculadoraInterface
{
	/**
	 * 
	 * @param ChamadaInterface $chamada
	 */
	public function __construct(ChamadaInterface $chamada, PlanoInterface $plano);
	
	/**
	 * 
	 * @param Tarifa $tarifa
	 */
	public function addTarifa(TarifaInterface $tarifa);	
	
	/**
	 * @return float
	 */
	public function getValorDaChamada();
}