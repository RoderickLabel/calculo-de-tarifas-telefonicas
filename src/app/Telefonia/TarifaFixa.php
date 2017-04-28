<?php 

namespace App\Telefonia;

class TarifaFixa 
{

    /**
     * @var string $origem
     */
    private $origem;

    /**
     * @var string $destino
     */
    private $destino;

    /**
     * @var string $valor
     */
    private $valor;


    public function __construct($origem, $destino, $valor)
    {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->valor = $valor;
    }

    /**
     * @return string 
     */
    public function getOrigem ()
    {
        return $this->origem;
    }

    /**
     * @return string 
     */
    public function getDestino ()
    {
        return $this->destino;
    }

    /**
     * @return string 
     */
    public function getValor ()
    {
        return $this->valor;
    }

}