<?php 

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use League\Csv\Reader;

use App\Helpers\FormatacaoHelper;

use App\Chamada;
use App\Plano;
use App\Tarifa;
use App\CalculadoraPlanoPadrao;
use App\CalculadoraPlanoFaleMuito;

/**
 * 
 * Realiza as configurações preliminares do Symfony Console
 * e seu respectivo comportamento ao iniciar
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class DefaultCommand extends Command
{
    protected function configure()
    {
        $this
            ->addArgument('ddd_de_origem', InputArgument::REQUIRED, 'Código DDD de Origem.')
            ->addArgument('ddd_de_destino', InputArgument::REQUIRED, 'Código DDD de Destino.')
            ->addArgument('tempo_em_minutos', InputArgument::REQUIRED, 'Tempo em minutos de ligação.')
            ->setName('calculador')
            ->setDescription('Exibe a listagem de valores.')
            ->setHelp('Este comando exibe a listagem de valores para cada plano,' 
                . "de acordo com o tempo de ligação, origem e destino passados por argumento.\n");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** Obtém tarifas via arquivo CSV */
    	$csv = Reader::createFromPath(__DIR__ . '/../../data/tarifa_fixa.csv');        
    	$tarifas = $csv->setOffset(1)->setLimit(6)->fetchAssoc(["origem", "destino", "minutos"]);
    	
        /** Obtém parâmetros passados via console */
        $origem = $input->getArgument('ddd_de_origem');
        $destino = $input->getArgument('ddd_de_destino');
        $minutos = $input->getArgument('tempo_em_minutos');
        
        /** Instancia Nova Chamada com parametros passados via console */
        $chamada = new Chamada($origem, $destino, $minutos);

        /** Instancia Planos */
        $planoComum = new Plano("Plano Comum", 0);
        $plano30 = new Plano("FaleMuito 30", 30);
        $plano60 = new Plano("FaleMuito 60", 60);
        $plano120 = new Plano("FaleMuito 120", 120);
        
        /** Instancia Calculadoras com seus devidos Objetos de Plano */
        $calculoPadrao = new CalculadoraPlanoPadrao($chamada, $planoComum);
        $calculo30    = new CalculadoraPlanoFaleMuito($chamada, $plano30);
        $calculo60    = new CalculadoraPlanoFaleMuito($chamada, $plano60);
        $calculo120   = new CalculadoraPlanoFaleMuito($chamada, $plano120);
        
        /** Popula Tarifas nos objetos de Calculo */
        foreach ($tarifas as $tarifa) {
        	$calculoPadrao->addTarifa( new Tarifa($tarifa['origem'], $tarifa['destino'], $tarifa['minutos']) );
        	$calculo30->addTarifa( new Tarifa($tarifa['origem'], $tarifa['destino'], $tarifa['minutos']) );
        	$calculo60->addTarifa( new Tarifa($tarifa['origem'], $tarifa['destino'], $tarifa['minutos']) );
        	$calculo120->addTarifa( new Tarifa($tarifa['origem'], $tarifa['destino'], $tarifa['minutos']) );        	
        }
                
        /** Exibe Header da Tabela */
        $line = "+" . str_pad("", 49, "-") . "+";
        $output->writeln($line);
        $output->writeln("|\t Plano \t\t|\t Valor \t\t  |");
        $output->writeln($line);
        
        /** Exibe Linhas da Tabela */
        $resultado = new FormatacaoHelper($calculo30->getValorDaChamada());
        $output->write([ "|\t", $plano30->getTitulo(), "\t|\t", $resultado->converteParaReais()]);
        $output->writeln("\t  |");
        $output->writeln($line);
        $resultado = new FormatacaoHelper($calculo60->getValorDaChamada());
        $output->write([ "|\t", $plano60->getTitulo(), "\t|\t", $resultado->converteParaReais()]);
        $output->writeln("\t  |");
        $output->writeln($line);
        $resultado = new FormatacaoHelper($calculo120->getValorDaChamada());
        $output->write([ "|\t", $plano120->getTitulo(), "\t|\t", $resultado->converteParaReais()]);
        $output->writeln("\t  |");
        $output->writeln($line);
        $resultado = new FormatacaoHelper($calculoPadrao->getValorDaChamada());
        $output->write([ "|\t", $planoComum->getTitulo(), "\t|\t", $resultado->converteParaReais()]);
        $output->writeln("\t  |");
        $output->writeln($line);
    }
}