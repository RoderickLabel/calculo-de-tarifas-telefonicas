<?php 

namespace App;

use App\Interfaces\PlanoInterface;
use App\Interfaces\ChamadaInterface;
use App\Interfaces\TarifaInterface;
use App\Interfaces\CalculadoraInterface;
use ArrayObject;

class CalculadoraPlanoPadrao implements CalculadoraInterface
{
	/** @var Chamada $chamada */
	private $chamada;
	
	/** @var \ArrayObject $tarifas */
	private $tarifas;
	
	/** @var Plano $plano */
	private $plano;

	
	public function __construct(ChamadaInterface $chamada, PlanoInterface $plano) 
	{
		$this->chamada = $chamada;
		$this->tarifas = new ArrayObject();
		$this->plano = $plano;
	}
	
	public function getPlano()
	{
		return $this->plano;
	}
	
	public function addTarifa(TarifaInterface $tarifa)
	{
		$this->tarifas->append($tarifa);
	}	
	
	private function isChamadaValida(TarifaInterface $tarifa)
	{
		$dddOrigemValido = ($tarifa->getDddOrigem() == $this->chamada->getDddOrigem());
		$dddDestinoValido = ($tarifa->getDddDestino() == $this->chamada->getDddDestino());
		return $dddOrigemValido && $dddDestinoValido;
	}	
	
	public function getValorDaChamada()
	{
		foreach($this->tarifas as $tarifa) {
			if ($this->isChamadaValida($tarifa)) {	
				return ($tarifa->getValor() * $this->chamada->getMinutos());
			}
		}
		return null;
	}
}