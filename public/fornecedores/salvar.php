<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Fornecedores.php');
require_once(__DIR__ . '/../../dao/DaoFornecedores.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoFornecedores = new DaoFornecedores($conn);
$daoFornecedores->inserir( new Fornecedores($_POST['nome'],$_POST['endereco'],$_POST['cidade'],$_POST['cnpj'],$_POST['telefone']));
    
header('Location: ./index.php');

?>


