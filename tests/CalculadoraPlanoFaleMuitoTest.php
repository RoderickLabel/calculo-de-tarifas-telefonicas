<?php

use PHPUnit\Framework\TestCase;
use App\Chamada;
use App\Plano;
use App\CalculadoraPlanoFaleMuito;
use App\Tarifa;

class CalculadoraPlanoFaleMuitoTest extends TestCase
{	
	public function testGetValorDaChamadaPossuiTarifaComMinutosExcedidos()
	{
		$chamada = new Chamada(18, 11, 200);
		$plano = new Plano("FaleMuito 30", 30);
		$calculadora = new CalculadoraPlanoFaleMuito($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertEquals(355.3, $valorDaChamada);
	}	
	
	public function testGetValorDaChamadaNaoPossuiTarifaComMinutosExcedidos()
	{
		$chamada = new Chamada(11, 20, 200);
		$plano = new Plano("Plano Comun", 0);
		$calculadora = new CalculadoraPlanoFaleMuito($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertNull(null, $valorDaChamada);
	}
	
	public function testValorDaChamadaPossuiTarifaComMinutosNaoExcedidos()
	{
		$chamada = new Chamada(11, 16, 20);
		$plano = new Plano("FaleMuito 30", 30);
		$calculadora = new CalculadoraPlanoFaleMuito($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertEquals(0, $valorDaChamada);
	}
	
	public function testGetValorDaChamadaNaoPossuiTarifa()
	{
		$chamada = new Chamada(18, 17, 100);
		$plano = new Plano("Plano Comun", 0);
		$calculadora = new CalculadoraPlanoFaleMuito($chamada, $plano);
		$calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$calculadora->addTarifa(new Tarifa(18, 11, 1.9));
		$valorDaChamada = $calculadora->getValorDaChamada();
		$this->assertNull(null, $valorDaChamada);
	}
	
}