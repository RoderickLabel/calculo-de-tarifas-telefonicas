<?php 

namespace App;

use App\Interfaces\PlanoInterface;
use App\Interfaces\ChamadaInterface;
use App\Interfaces\TarifaInterface;
use App\Interfaces\CalculadoraInterface;
use ArrayObject;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class CalculadoraPlanoFaleMuito implements CalculadoraInterface
{
	/** @var Chamada $chamada */
	private $chamada;	
	
	/** @var \ArrayObject $tarifas */
	private $tarifas;
	
	/** @var Plano $plano */
	private $plano;
	
	/**
	 * 
	 * @param ChamadaInterface $chamada
	 * @param PlanoInterface $plano
	 */
	public function __construct(ChamadaInterface $chamada, PlanoInterface $plano) 
	{
		$this->chamada = $chamada;
		$this->tarifas = new ArrayObject();
		$this->plano = $plano;		
	}
	
	/**
	 * 
	 * @return Plano
	 */
	public function getPlano()
	{
		return $this->plano;
	}
	
	/**
	 * Incrementa objeto Tarifa para Array de Objetos
	 * @param TarifaInterface $tarifa
	 */
	public function addTarifa(TarifaInterface $tarifa)
	{
		$this->tarifas->append($tarifa);
	}	

	/**
	 * Verifica apenas se a chamada é válida
	 * para isso constantando se o DDD de origem e Destino 
	 * encontram-se cadastradas na tabela de tarifas
	 * @param TarifaInterface $tarifa
	 * @return boolean
	 */
	private function isChamadaValida(TarifaInterface $tarifa)
	{
		$dddOrigemValido = ($tarifa->getDddOrigem() == $this->chamada->getDddOrigem());
		$dddDestinoValido = ($tarifa->getDddDestino() == $this->chamada->getDddDestino());
		return $dddOrigemValido && $dddDestinoValido;
	}	
	
	/**
	 * Realiza o cálculo de Fato
	 * @return number|NULL
	 */
	public function getValorDaChamada()
	{
		foreach($this->tarifas as $tarifa) {
			if ($this->isChamadaValida($tarifa)) {
				if ($this->chamada->getMinutos() <= $this->plano->getMinutos()) {
					return 0;
				}
				return ($tarifa->getValor() * 1.1) * ($this->chamada->getMinutos() - $this->plano->getMinutos());
			}
		}
		return null;
	}
}