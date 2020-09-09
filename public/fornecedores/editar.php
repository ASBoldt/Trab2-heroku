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
$fornecedor = $daoFornecedores->porId( $_GET['id'] );
    
if (! $fornecedor )
    header('Location: ./index.php');

else {  
    ob_start();
    ?>
    <div class="container">
        <div class="py-5 text-center">
        <h2>Cadastro de Fornecedores </h2>
        </div>
        <div class="row">
          <div class="col-md-12" >
           
            <form action="atualizar.php"  method="POST">

                <div class="form-group">
                  <input type="hidden" name="id" 
                          value="<?php echo $fornecedor->getId(); ?>">      
                
				        <label for="nome">Nome do Fornecedor</label>
                        <input type="text" placeholder="Nome do Fornecedor" 
                            value="<?php echo $fornecedor->getNome(); ?>"
                            class="form-control" name="nome" required>
                         
				        <label for="nome">Endereco</label>
					    <input type="text" placeholder="Endereco" 
                            value="<?php echo $fornecedor->getEndereco(); ?>"
                            class="form-control" name="endereco" required>
                         
				        <label for="nome">Cidade</label>
					    <input type="text" placeholder="Cidade" 
                            value="<?php echo $fornecedor->getCidade(); ?>"
                            class="form-control" name="cidade" required>         
				    
                        <label for="nome">CNPJ</label>
					    <input type="text" placeholder="Cnpj" 
                            value="<?php echo $fornecedor->getCnpj(); ?>"
                            class="form-control" name="cnpj" required>	
 		
                        <label for="nome">Telefone</label>
					    <input type="text" placeholder="Telefone" 
                            value="<?php echo $fornecedor->getTelefone(); ?>"
                            class="form-control" name="telefone" >
                   		
                         
                </div>
			        <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
            </form>  
        </div>
    </div>
<?php

    $content = ob_get_clean();
    echo html( $content );
} // else-if

?>