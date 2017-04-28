<?php 

use PHPUnit\Framework\TestCase;
use App\Telefonia\Conversao;


class ConversaoTest extends TestCase
{

    public function testConvertePonto()
    {
        $conversao = new Conversao('R$ 2.331,90');
        $valor = $conversao->convertePonto();
        $this->assertEquals(2331.9, $valor);   
    }

    public function testConverteVirgula()
    {
        $conversao = new Conversao(1122.9);
        $valor = $conversao->converteVirgula();
        $this->assertEquals('1.122,90', $valor);      
    }

}