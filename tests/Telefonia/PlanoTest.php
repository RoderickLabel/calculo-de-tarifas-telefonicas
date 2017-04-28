<?php 

use PHPUnit\Framework\TestCase;
use App\Telefonia\Plano;

class PlanoTest extends TestCase
{
    private $plano;

    protected function setUp() 
    {
        $this->plano = new Plano("FaleMuito 120", 120);
        parent::setUp();
    }

    public function testGetPlano()
    {
        $plano = $this->plano->getPlano();
        $this->assertEquals("FaleMuito 120", $plano);
    }

    public function testGetTempo()
    {
        $tempo = $this->plano->getTempo();
        $this->assertEquals(120, $tempo);
    }


}