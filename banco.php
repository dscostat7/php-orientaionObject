<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';

$primeiraConta = new Conta(new Titular ("061.725.329-36", "Diego Souza"));
$primeiraConta->depositar(500);
$primeiraConta->sacar(100);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo '$' . $primeiraConta->recuperaSaldo() . PHP_EOL;

new Conta(new Titular ("711.905.469-49", "Nome de Teste"));

$segundaConta = new Conta(new Titular ("123.456.789-10", "Nome de Teste"));
echo $segundaConta->recuperaNomeTitular() . PHP_EOL;

echo "O banco possui " . Conta::numeroDeContas() . " contas no total!" . PHP_EOL;