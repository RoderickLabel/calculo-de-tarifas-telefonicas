<?php 

namespace App;

use App\Interfaces\TarifaInterface;

class Tarifa implements TarifaInterface
{
    /**
     * @var int $origem
     */
    private $origem;

    /**
     * @var int $destino
     */
    private $destino;

    /**
     * @var float $valor
     */
    private $valor;


    public function __construct($origem, $destino, $valor)
    {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->valor = $valor;
    }

    /**
     * @return int 
     */
    public function getDddOrigem ()
    {
        return $this->origem;
    }

    /**
     * @return int 
     */
    public function getDddDestino ()
    {
        return $this->destino;
    }

    /**
     * @return float 
     */
    public function getValor ()
    {
        return $this->valor;
    }
}