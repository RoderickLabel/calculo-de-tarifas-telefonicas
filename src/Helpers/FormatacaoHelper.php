<?php 

namespace App\Helpers;
/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class FormatacaoHelper
{    
    private $valor;

    public function __construct($valor = null)
    {
        $this->valor = $valor;
    }

    /**
     * @return string
     */
    public function converteParaReais()
    {
    	if (is_null($this->valor)) {
    		return "____________";
    	}
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
}