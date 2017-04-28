<?php 

namespace App\Telefonia;

class Plano
{
    
    /**
     * @var string
     */    
    private $plano;

    /**
     * @var int
     */
    private $tempo;


    public function __construct($plano, $tempo)
    {
        $this->plano = $plano;
        $this->tempo = $tempo;
    }

    /**
     * @return string $plano
     */
    public function getPlano()
    {
        return $this->plano;
    }

    /**
     * @return int $tempo
     */    
    public function getTempo()
    {
        return $this->tempo;
    }



}