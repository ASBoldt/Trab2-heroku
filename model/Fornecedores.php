<?php 

class Fornecedores {

  private $id;
  private $nome;
  private $endereco;
  private $cidade;
  private $cnpj;
  private $telefone;

  public function __construct(string $nome='', string $endereco='',string $cidade='',string $cnpj='',string $telefone='',int $id=-1) {
    $this->id = $id;
    $this->nome = $nome;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->cnpj = $cnpj;
    $this->telefone = $telefone; 
  }

  public function setId(int $id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setNome(string $nome) {
    $this->nome = $nome;
  }
  public function getNome() {
    return $this->nome;
  }
  public function setEndereco(string $endereco) {
    $this->endereco = $endereco;
  }
  public function getEndereco() {
    return $this->endereco;
  }
  public function setCidade(string $cidade) {
    $this->cidade = $cidade;
  }
  public function getCidade() {
    return $this->cidade;
  }
  public function setCnpj(string $cnpj) {
    $this->cnpj = $cnpj;
  }
  public function getCnpj() {
    return $this->cnpj;
  }
  public function setTelefone(string $telefone) {
    $this->telefone = $telefone;
  }
  public function getTelefone() {
    return $this->telefone;
  }  
};