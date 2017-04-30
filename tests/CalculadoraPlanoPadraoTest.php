<?php

use PHPUnit\Framework\TestCase;
use App\Chamada;
use App\Plano;
use App\CalculadoraPlanoPadrao;
use App\Tarifa;

class CalculadoraPlanoPadraoTest extends TestCase
{	
	public function testGetValorDaChamadaPossuiTarifa()
	{
		$chamada = new Chamada(18, 11, 200);
		$plano = new Plano("Plano Comun", 0);
		$calculadora = new CalculadoraPlanoPadrao($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertEquals(380, $valorDaChamada);
	}
	
	public function testGetValorDaChamadaNaoPossuiTarifa()
	{
		$chamada = new Chamada(11, 20, 200);
		$plano = new Plano("Plano Comun", 0);
		$calculadora = new CalculadoraPlanoPadrao($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertEquals(null, $valorDaChamada);		
	}
}