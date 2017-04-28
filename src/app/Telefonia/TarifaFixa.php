<?php 

namespace App\Telefonia;

use App\Telefonia\Conversao;

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
        $conversao = new Conversao($valor);
        $this->origem = $origem;
        $this->destino = $destino;
        $this->valor = ($conversao->convertePonto());
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