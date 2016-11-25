<?php
/**
 * Created by PhpStorm.
 * User: Thiago Gomes
 * Date: 25/11/2016
 * Time: 16:20
 */
  require_once('functions.php');
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Novo Cliente</h2>

    <form action="add.php" method="post">
        <!-- area de campos do form -->
        <hr />
        <div class="row">
            <div class="form-group col-md-12">
                <label for="name">Nome / Razão Social</label>
                <input type="text" class="form-control" name="customer['nome']">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-9">
                <label for="campo2">Endereço</label>
                <input type="text" class="form-control" name="customer['endereco']">
            </div>
            <div class="from-group col-md-1">
                <label for="numero">Numero</label>
                <input type="text" class="form-control" name="customer['numero']">
            </div>
            <div class="from-group col-md-2">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="customer['cep']">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="campo1">Bairro</label>
                <input type="text" class="form-control" name="customer['bairro']">
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">Cidade</label>
                <input type="text" class="form-control" name="customer['cidade']">
            </div>

            <div class="form-group col-md-2">
                <label for="campo3">Telefone</label>
                <input type="text" class="form-control" name="customer['telefone']">
            </div>


        </div>



        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>