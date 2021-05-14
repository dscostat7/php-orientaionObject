<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta("Diego Souza", "061.725.329-36");
$primeiraConta->depositar(500);
$primeiraConta->sacar(100);

echo $primeiraConta->recuperaNome() . PHP_EOL;
echo $primeiraConta->recuperaCpf() . PHP_EOL;
echo '$' . $primeiraConta->recuperaSaldo() . PHP_EOL;
