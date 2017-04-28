<?php 

use PHPUnit\Framework\TestCase;
use App\Telefonia\TarifaFixa;

class TarifaFixaTest extends TestCase
{
    private $tarifa;

    protected function setUp() 
    {
        $this->tarifa = new TarifaFixa(11, 16, 1.9);
        parent::setUp();
    }

    public function testGetOrigem()
    {
        $origem = $this->tarifa->getOrigem();
        $this->assertEquals(11, $origem);
    }

    public function testGetDestino()
    {
        $destino = $this->tarifa->getDestino();
        $this->assertEquals(16, $destino);
    }

    public function testGetValor()
    {
        $valor = $this->tarifa->getValor();
        $this->assertEquals(1.9, $valor);
    }



}