<?php 

use PHPUnit\Framework\TestCase;
use App\Plano;

class PlanoTest extends TestCase
{
    private $plano;

    protected function setUp() 
    {
        $this->plano = new Plano("FaleMuito 120", 120);
        parent::setUp();
    }

    public function testGetTitulo()
    {
    	$titulo = $this->plano->getTitulo();
    	$this->assertEquals("FaleMuito 120", $titulo);
    }

    public function testGetMinutos()
    {
        $minutos = $this->plano->getMinutos();
        $this->assertEquals(120, $minutos);
    }
}