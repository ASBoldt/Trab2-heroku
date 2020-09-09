<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Fornecedores.php');
require_once(__DIR__ . '/../../dao/DaoFornecedores.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoFornecedores = new DaoFornecedores($conn);
$fornecedor = $daoFornecedores->porId( $_POST['id'] );
    
if ( $fornecedor )
{  
  $fornecedor->setNome( $_POST['nome'] );
  $fornecedor->setEndereco( $_POST['endereco'] );
  $fornecedor->setCidade( $_POST['cidade'] );
  $fornecedor->setCnpj( $_POST['cnpj'] );
  $fornecedor->setTelefone( $_POST['telefone'] );
  $daoFornecedores->atualizar( $fornecedor );
}

header('Location: ./index.php');