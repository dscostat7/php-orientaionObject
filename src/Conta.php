<?php

class Conta 
{
    private $titular;
    private $saldo;
    private static $numeroContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroContas++;      // Atributo da propria Classe;
    }

    public function __destruct()
    {
        self::$numeroContas--;
    }

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

    public function recuperaSaldo()
    {
        return $this->saldo;
    }

    public function recuperaNomeTitular() : string 
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular() : string 
    {
        return $this->titular->recuperaCpf();
    }


    public static function numeroDeContas(): int
    {
        return self::$numeroContas;
    }
}