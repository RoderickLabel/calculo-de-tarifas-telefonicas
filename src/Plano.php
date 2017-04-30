<?php 

namespace App;

use App\Interfaces\PlanoInterface;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
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

	/**
	 * 
	 * @param string $titulo
	 * @param int $minutos
	 */
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