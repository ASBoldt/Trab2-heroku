<?php

require_once(__DIR__ . '/../../templates/template-html.php');
ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Fornecedores</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

              <form action="salvar.php"  method="POST">
                  <div class="form-group">
                        <label for="nome">Nome do fornecedor</label>
                        <input type="text" class="form-control" id="nome"
                            name="nome" placeholder="Nome do fornecedor" required>
                        
                        <label for="endereco">Endereço do fornecedor</label>
                        <input type="text" class="form-control" id="endereco"
                            name="endereco" placeholder="Endereco do fornecedor" required>
                        
                        <label for="cidade">Cidade do fornecedor</label>
                        <input type="text" class="form-control" id="cidade"
                            name="cidade" placeholder="Cidade do fornecedor" required>
                        
                        <label for="cnpj">CNPJ do fornecedor</label>
                        <input type="text" class="form-control" id="cnpj"
                            name="cnpj" placeholder="CNPJ do fornecedor" required>
                        
                        <label for="telefone">Telefone do fornecedor</label>
                        <input type="text" class="form-control" id="telefone"
                            name="telefone" placeholder="Telefone do fornecedor" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
              </form>

            </div>
        </div>
    </div>
<?php

$content = ob_get_clean();
echo html( $content );
    
?>


