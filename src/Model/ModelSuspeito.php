<?php


namespace Projeto\APRJ\Model;


class ModelSuspeito
{
    private $placa;
    private $modelo;
    private $data_cadastro;
    private $ip;

    public function __construct($placa, $modelo,$data_cadastro, $ip)
    {
        $this->modelo = $modelo;
        $this->placa = $placa;
        $this->ip = $ip;
        $this->data_cadastro = $data_cadastro;
    }

    public function inserir($tabela)
    {
        $query = "INSERT INTO  $tabela (modelo,placa,data_cadastro,ip) values (:modelo,:placa,:data_cadastro,:ip)";
        $conexao = ModelConexao::conect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':modelo', $this->modelo);
        $stmt->bindValue(':placa', $this->placa);
        $stmt->bindValue(':data_cadastro', $this->data_cadastro);
        $stmt->bindValue(':ip', $this->ip);
        return $stmt->execute();

    }

    public function buscaPelaPlaca($tabela)
    {
        $query = "SELECT * FROM $tabela WHERE placa = :placa";
        $conexao = ModelConexao::conect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':placa',$this->placa);
        $stmt->execute();
        return $stmt->fetchAll();

    }

}