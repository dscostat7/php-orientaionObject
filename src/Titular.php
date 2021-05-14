<?php

class Titular 
{
    private $cpf;
    private $nome;


    public function __construct(Cpf $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->validaNomeTitular($nome);
    }

    public function recuperaCpf() : string
    {
        return $this->cpf->recuperaNumero();
    }

    public function recuperaNome() : string 
    {
        return $this->nome;
    }

    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 3) {
            echo "O Campo Nome precisa ter pelo menos 3 caracteres" . PHP_EOL;
            exit();
        } 
    }
}