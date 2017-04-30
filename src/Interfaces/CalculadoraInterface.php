<?php 

namespace App\Interfaces;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
interface CalculadoraInterface
{
	/**
	 * 
	 * @param ChamadaInterface $chamada
	 * @param PlanoInterface $plano
	 */
	public function __construct(ChamadaInterface $chamada, PlanoInterface $plano);
	
	/**
	 * Incrementa objeto Tarifa para Array de Objetos
	 * @param Tarifa $tarifa
	 */
	public function addTarifa(TarifaInterface $tarifa);	
	
	/**
	 * Realiza o cálculo de Fato
	 * @return float
	 */
	public function getValorDaChamada();
}