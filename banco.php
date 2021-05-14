<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';
require_once 'src/Cpf.php';

$titularDiego = new Titular (new Cpf("066.055.077-99"), "Diego Souza");
$primeiraConta = new Conta($titularDiego);
$primeiraConta->depositar(500);
$primeiraConta->sacar(100);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo '$' . $primeiraConta->recuperaSaldo() . PHP_EOL;

new Conta(new Titular (new Cpf("987.654.321.98"), "Teste"));

$titularVitor = new Titular (new Cpf("123.456.789-10"), "Vitor Souza");
$segundaConta = new Conta($titularVitor);
echo $segundaConta->recuperaNomeTitular() . PHP_EOL;

echo "O banco possui " . Conta::numeroDeContas() . " contas no total!" . PHP_EOL;