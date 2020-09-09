<?php 
require_once(__DIR__ . '/../model/Fornecedores.php');
require_once(__DIR__ . '/../db/Db.php');

// Classe para persistencia de Fornecedores
// DAO - Data Access Object
class DaoFornecedores {
    
  private $connection;

  public function __construct(Db $connection) {
      $this->connection = $connection;
  }
  
  public function porId(int $id): ?Fornecedores {
    $sql = "SELECT nome, endereco, cidade, cnpj,telefone FROM fornecedores where id = ?";
    $stmt = $this->connection->prepare($sql);
    $dep = null;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      if ($stmt->execute()) {
        $nome = '';
        $stmt->bind_result($nome,$endereco,$cidade,$cnpj,$telefone);
        $stmt->store_result();
        if ($stmt->num_rows == 1 && $stmt->fetch()) {
          $forn = new Fornecedores($nome,$endereco,$cidade,$cnpj,$telefone,$id);
        }
      }
      $stmt->close();
    }
    return $forn;
  }

  public function inserir(Fornecedores $fornecedor): bool {
    $sql = "INSERT INTO fornecedores (nome,endereco,cidade,cnpj,telefone) VALUES(?,?,?,?,?)";
    $stmt = $this->connection->prepare($sql);
    $res = false;
    if ($stmt) {
      $nome = $fornecedor->getNome();
      $endereco = $fornecedor->getEndereco();
      $cidade = $fornecedor->getCidade();
      $cnpj = $fornecedor->getCnpj();
      $telefone = $fornecedor->getTelefone();
      $stmt->bind_param('sssss', $nome,$endereco,$cidade,$cnpj,$telefone);
      if ($stmt->execute()) {
          $id = $this->connection->getLastID();
          $fornecedor->setId($id);
          $res = true;
      }
      $stmt->close();
    }
    return $res;
  }

  public function remover(Fornecedores $fornecedor): bool {
    $sql = "DELETE FROM fornecedores where id=?";
    $id = $fornecedor->getId(); 
    $stmt = $this->connection->prepare($sql);
    $ret = false;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  public function atualizar(Fornecedores $fornecedor): bool {
    $sql = "UPDATE fornecedores SET nome = ?, endereco = ?, cidade = ?, cnpj = ?, telefone = ? WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $ret = false;      
    if ($stmt) {
      $id   = $fornecedor->getId();
      $nome = $fornecedor->getNome();
      $endereco = $fornecedor->getEndereco();
      $cidade = $fornecedor->getCidade();
      $cnpj = $fornecedor->getCnpj();
      $telefone = $fornecedor->getTelefone();
      $id   = $fornecedor->getId();
      $stmt->bind_param('sssssi', $nome, $endereco, $cidade, $cnpj, $telefone, $id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  
  public function todos(): array {
    $sql = "SELECT id, nome, endereco, cidade, cnpj, telefone from fornecedores";
    $stmt = $this->connection->prepare($sql);
    $fornecedores = [];
    if ($stmt) {
      if ($stmt->execute()) {
        $id = 0; $nome = '';
        $stmt->bind_result($id, $nome, $endereco, $cidade, $cnpj, $telefone);
        $stmt->store_result();
        while($stmt->fetch()) {
          $fornecedores[] = new Fornecedores($nome,$endereco, $cidade, $cnpj, $telefone, $id);
        }
      }
      $stmt->close();
    }
    return $fornecedores;
  }

};

