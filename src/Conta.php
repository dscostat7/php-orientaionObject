<?php

class Conta 
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;
    private static $numeroContas = 0;

    public function __construct(string $nomeTitular, string $cpfTitular)
    {
        $this->nomeTitular = $nomeTitular;
        $this->validaContaTitular($nomeTitular);
        $this->cpfTitular = $cpfTitular;
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

   public function recuperaCpf()
    {
        return $this->cpfTitular;
    }

    public function recuperaNome()
    {
        return $this->nomeTitular;
    }

    private function validaContaTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 3) {
            echo "O Campo Nome precisa ter pelo menos 5 caracteres" . PHP_EOL;
            exit();
        } 
    }

    public static function numeroDeContas(): int
    {
        return self::$numeroContas;
    }
}