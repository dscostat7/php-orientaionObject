<?php

class Conta 
{
    public string $cpfTitular;
    public string $nomeTitular;
    private float $saldo = 0;

    public function sacar(float $valorSacar)
    {
        if($valorSacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        } 
        $this->saldo -= $valorSacar;   
    }


    public function depositar(float $valorDeposito)
    {
        if($valorDeposito < 0) {
            echo "Você não pode depositar um valor negativo!";
            return;
        } 
        $this->saldo += $valorDeposito;    
    }

    public function transfere(float $valorTransf, Conta $contaDestino)
    {
        if($valorTransf > $this->saldo) {
            echo "Valor indisponível!";
            return;
        } 
        $this->sacar($valorTransf);
        $contaDestino->depositar($valorTransf);  
        echo "Transferência realizada com sucesso!"; 
    }
}