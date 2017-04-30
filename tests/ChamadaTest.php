<?php

use PHPUnit\Framework\TestCase;
use App\Chamada;

class ChamadaTest extends TestCase
{
	private $chamada;
	
	protected function setUp()
	{
		$this->chamada = new Chamada(11, 18, 1.9);
		parent::setUp();
	}
	
	public function testGetDddOrigem() 
	{
		$ddd = $this->chamada->getDddOrigem();
		$this->assertEquals(11, $ddd);
	}
	
	public function testGetDddDestino() 
	{
		$ddd = $this->chamada->getDddDestino();
		$this->assertEquals(18, $ddd);
	}
	
	public function testGetMinutos() {
		$minutos = $this->chamada->getMinutos();
		$this->assertEquals(1.9, $minutos);
	}	
}