<?php 

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

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

        $origin = $input->getArgument('ddd_de_origem');
        $destiny = $input->getArgument('ddd_de_destino');
        $time = $input->getArgument('tempo_em_minutos');

        //$output->writeln([$origin, $destiny, $time]);
        
        $line = "+" . str_pad("", 49, "-") . "+";
        $output->writeln($line);
        $output->writeln("|\t Plano \t\t|\t Valor \t\t  |");
        $output->writeln($line);

        foreach (range(1, 4) as $v) {            
            $output->write([
                "|\t",
                "FaleMuito 120",
                "\t|\t",
                "R$ 650,00"
            ]);
            $output->writeln("\t  |");
            $output->writeln($line);
        }

    }

}