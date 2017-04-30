<?php

use PHPUnit\Framework\TestCase;
use App\Chamada;
use App\Plano;
use App\CalculadoraPlanoFaleMuito;
use App\Tarifa;

class CalculadoraPlanoFaleMuitoTest extends TestCase
{
	private $calculadora;
	
	protected function setUp()
	{
		$chamada = new Chamada(18, 11, 200);
		$plano = new Plano("FaleMuito 30", 30);
		$this->calculadora = new CalculadoraPlanoFaleMuito($chamada, $plano);
		$this->calculadora->addTarifa(new Tarifa(11, 16, 1.9));
		$this->calculadora->addTarifa(new Tarifa(16, 11, 2.9));
		$this->calculadora->addTarifa(new Tarifa(11, 17, 1.7));
		$this->calculadora->addTarifa(new Tarifa(17, 11, 2.7));
		$this->calculadora->addTarifa(new Tarifa(11, 18, 0.9));
		$this->calculadora->addTarifa(new Tarifa(18, 11, 1.9));
	}
	
	public function testGetValorDaChamadaPossuiTarifa()
	{
		$valorDaChamada = $this->calculadora->getValorDaChamada();
		$this->assertEquals(355.3, $valorDaChamada);
	}	
	
	public function testGetValorDaChamadaNaoPossuiTarifa()
	{
		$valorDaChamada = $this->calculadora->getValorDaChamada();
		$this->assertNull(null, $valorDaChamada);
	}
}