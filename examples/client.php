<?php 

/**
 * ### Objetos Necessários para Cálculos ###
 * 
 * Conversao ---------------------- OK
 * Chamada ------------------------ OK
 * Tarifa ------------------------- OK
 * Plano -------------------------- OK
 * CalculadoraDeChamadas
 * 
 *
 * #### Views para Cli
 *
 * TabelaCli
 * LinhaCli
 */

$tarifas = new LeagueCSV("tarifa_fixa.csv")->item(10);
$planos = new LeagueCSV("planos.csv")->item(10);

$chamada = new Chamada(18, 11, 200);
$calculadora = new CalculadoraDeChamadas($chamada);

foreach ($tarifas as $tarifa) {
    $calculadora->addTarifa(new Tarifa(18, 11, 1.5));
}

foreach ($planos as $plano) {    
    $calculadora->addPlano(new Plano("FaleMuito 120", 120));
}

$tabela = new TabelaCli();
foreach($calculadora->getListagem() as $linha) {
    $tabela->addLinha(new Linha($linha->getPlano(), $linha->getValor()));
}
$tabela->exibeTabela();

// busca tarifa 
// if ( busca válida, origem e destino baterem )
//      varre planos
//          calcula minutos para cada plano e excedentes com taxa de 10% adicional
// else 
//      retorna resultados em branco

$tarifas = new LeagueCSV("tarifa_fixa.csv")->item(10);

$chamada = new Chamada(18, 11, 200);

$planoComum = new Plano("Plano Comun", 0);
$plano30 = new Plano("FaleMuito 30", 30);
$plano60 = new Plano("FaleMuito 60", 60);
$plano120 = new Plano("FaleMuito 120", 120);

$calculoPadrao = new CalculadoraPlanoPadrao($chamada, $planoComum);
$calculo30    = new CalculadoraPlanoFaleMuito($chamada, $plano30);
$calculo60    = new CalculadoraPlanoFaleMuito($chamada, $plano60);
$calculo120   = new CalculadoraPlanoFaleMuito($chamada, $plano120);

foreach ($tarifas as $tarifa) {
    $calculoPadrao->addTarifa( new Tarifa($tarifa[0], $tarifa[1], $tarifa[2]]) );
    $calculo30->addTarifa( new Tarifa($tarifa[0], $tarifa[1], $tarifa[2]]) );
    $calculo60->addTarifa( new Tarifa($tarifa[0], $tarifa[1], $tarifa[2]]) );
    $calculo120->addTarifa( new Tarifa($tarifa[0], $tarifa[1], $tarifa[2]]) );
}

$tabela = new TabelaCli();
$tabela->addLinha(new LinhaTabelaCli($plano30->getTitulo(), $calculo30->getResultado()));
$tabela->addLinha(new LinhaTabelaCli($plano60->getTitulo(), $calculo60->getResultado()));
$tabela->addLinha(new LinhaTabelaCli($plano120->getTitulo(), $calculo120->getResultado()));
$tabela->addLinha(new LinhaTabelaCli($planoPadrao->getTitulo(), $calculoPadrao->getResultado()));
$tabela->exibeTabela();