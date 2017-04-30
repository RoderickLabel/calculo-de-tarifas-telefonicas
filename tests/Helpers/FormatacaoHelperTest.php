<?php 

use PHPUnit\Framework\TestCase;
use App\Helpers\FormatacaoHelper;


class FormatacaoHelperTest extends TestCase
{

    public function testConverteReaisSeNaoForNulo()
    {
    	$conversao = new FormatacaoHelper(1122.9);
        $valor = $conversao->converteParaReais();
        $this->assertEquals('R$ 1.122,90', $valor);      
    }
    
    public function testConverteReaisSeForNulo()
    {
    	$conversao = new FormatacaoHelper(null);
    	$valor = $conversao->converteParaReais();
    	$this->assertEquals('____________', $valor);
    }

}