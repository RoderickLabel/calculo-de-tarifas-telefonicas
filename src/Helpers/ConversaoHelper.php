<?php 

namespace App\Helpers;

class ConversaoHelper
{    
    private $valor;

    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return string
     */
    public function convertePonto()
    {
        $valor = trim($this->valor, "R$");
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    /**
     * @return string
     */
    public function converteVirgula()
    {
        return number_format($this->valor, 2, ',', '.');
    }
}