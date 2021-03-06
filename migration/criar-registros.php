<?php
require_once(__DIR__ . "/../db/Db.php");
require_once(__DIR__ . "/../model/Departamento.php");
require_once(__DIR__ . "/../model/Marca.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/Fornecedores.php");
require_once(__DIR__ . "/../dao/DaoDepartamento.php");
require_once(__DIR__ . "/../dao/DaoMarca.php");
require_once(__DIR__ . "/../dao/DaoProduto.php");
require_once(__DIR__ . "/../dao/DaoFornecedores.php");

$db = Db::getInstance();
if ($db->connect()) {
  $daoMarca = new DaoMarca($db);
  $daoProd = new DaoProduto($db);
  $daoDep  = new DaoDepartamento($db);
  $daoForn = new DaoFornecedores($db);

  $deps[]   = new Departamento("Eletrônicos");
  $deps[]   = new Departamento("Roupas");
  $deps[]   = new Departamento("Informática");
  $deps[]   = new Departamento("Som e imagem");
  $deps[]   = new Departamento("Gamers");
  $deps[]   = new Departamento("Alimentos");
  $deps[]   = new Departamento("Bebidas");
  $deps[]   = new Departamento("Acessórios automotivos");
  foreach($deps as $dep) $daoDep->inserir($dep);

  $marcas[] = new Marca("Sony");
  $marcas[] = new Marca("LG");
  $marcas[] = new Marca("Samsung");
  $marcas[] = new Marca("Asus");
  $marcas[] = new Marca("Acer");
  $marcas[] = new Marca("AOC");
  $marcas[] = new Marca("Xiaomi");
  $marcas[] = new Marca("Multilaser");
  foreach($marcas as $marca) $daoMarca->inserir($marca);

  $prods[] = new Produto("Monitor AOC 21.5", 500.55, 5, $marcas[5]);
  $prods[] = new Produto("Notebook Acer Aspire", 5000, 2, $marcas[4]);
  $prods[] = new Produto("Tablet Multilaser 10p", 200, 20, $marcas[7]);
  foreach($prods as $prod) $daoProd->inserir($prod);

  $forns[]   = new Fornecedores("LPMA INDUST", "Rua Armando AraujoJ, 1928","VICOSA","087601000/18","663444-8877");
  $forns[]   = new Fornecedores("TEste", "Rua Armando teste, 8","VICO","087601000/28","663444-8877");
  $forns[]   = new Fornecedores("LP INDUST", "Rua Armando, 19","VI","087601002/18","663444-8877");
  foreach($forns as $forn) $daoForn->inserir($forn);

  $daoProd->sincronizarDepartamentos($prods[0], [
    $deps[0]->getId(), $deps[2]->getId(), $deps[3]->getId()
  ]);
  $daoProd->sincronizarDepartamentos($prods[1], [
    $deps[0]->getId(), $deps[2]->getId(), $deps[3]->getId(), $deps[4]->getId()
  ]);
  $daoProd->sincronizarDepartamentos($prods[2], [
    $deps[0]->getId(), $deps[3]->getId()
  ]);


}
exit;