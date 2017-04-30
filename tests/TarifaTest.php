<?php 

use PHPUnit\Framework\TestCase;
use App\Tarifa;

class TarifaTest extends TestCase
{
    private $tarifa;

    protected function setUp() 
    {
        $this->tarifa = new Tarifa(11, 16, 1.9);
        parent::setUp();
    }

    public function testGetDddOrigem()
    {
        $origem = $this->tarifa->getDddOrigem();
        $this->assertEquals(11, $origem);
    }

    public function testGetDddDestino()
    {
    	$destino = $this->tarifa->getDddDestino();
        $this->assertEquals(16, $destino);
    }

    public function testGetValor()
    {
        $valor = $this->tarifa->getValor();
        $this->assertEquals(1.9, $valor);
    }
}