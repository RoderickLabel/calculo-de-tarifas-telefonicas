<?php 

use PHPUnit\Framework\TestCase;
use App\Helpers\ConversaoHelper;


class ConversaoTest extends TestCase
{

    public function testConvertePonto()
    {
        $conversao = new ConversaoHelper('R$ 2.331,90');
        $valor = $conversao->convertePonto();
        $this->assertEquals(2331.9, $valor);   
    }

    public function testConverteVirgula()
    {
        $conversao = new ConversaoHelper(1122.9);
        $valor = $conversao->converteVirgula();
        $this->assertEquals('1.122,90', $valor);      
    }

}