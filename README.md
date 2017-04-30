# Cálculo de Tarifas Telefônicas
[Teste para Desenvolvedor na Fundação Casper Líbero](https://bitbucket.org/casperlibero/fcl-dev-test), foi escolhido o [Cálculo de Tarifas Telefônicas](https://bitbucket.org/casperlibero/fcl-dev-test/src/7a410a4716bab1de0a369ef7b4446792b7c6f2c0/TESTE-2.md), e este projeto trata-se de uma simples aplicação CLI.

### Instalação

```
$ git clone https://github.com/RoderickLabel/calculo-de-tarifas-telefonicas.git
```

### Dependências
  - [Symfony/Console](https://github.com/symfony/console)
  - [League/Csv](https://github.com/thephpleague/csv)

Como as dependências já encontram-se inclusas no arquivo composer.json basta entrar no diretório clonado e resolver as dependências via composer rodando os seguintes comandos:
```
$ cd calculo-de-tarifas-telefonicas/
$ composer update
```

### Rodando os testes
```
$ phpunit --colors  --bootstrap  vendor/autoload.php tests --debug
```

### Rodando o cliente cli
Os três parâmetros (DDD de Origem, DDD de Destino e Minutos de Ligação) são obrigatórios e devem ser passados como inteiros
```
$ php calculador 18 11 200
```
Para ajuda, efetue o comando
```
$ php calculador --help
```