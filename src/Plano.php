<?php 

namespace App;

use App\Interfaces\PlanoInterface;

/**
 * @author roderick <roderickruotolo@gmail.com>
 */
class Plano implements PlanoInterface
{    
    /**
     * @var string
     */    
    private $titulo;

    /**
     * @var int
     */
    private $minutos;


    public function __construct($titulo, $minutos)
    {
        $this->titulo = $titulo;
        $this->minutos = $minutos;
    }

    /**
     * @return string $titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return int $minutos
     */    
    public function getMinutos()
    {
        return $this->minutos;
    }
}