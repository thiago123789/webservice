<?php
require_once('functions.php');
edit();
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Atualizar Cliente</h2>

    <form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
        <hr />
        <div class="row">
            <div class="form-group col-md-12">
                <label for="name">Nome / Razão Social</label>
                <input type="text" class="form-control" name="customer['nome']" value="<?php echo $customer['nome']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-9">
                <label for="campo2">Endereço</label>
                <input type="text" class="form-control" name="customer['endereco']" value="<?php echo $customer['endereco']; ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="campo1">Numero</label>
                <input type="text" class="form-control" name="customer['numero']" value="<?php echo $customer['numero']; ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="campo2">CEP</label>
                <input type="text" class="form-control" name="customer['cep']" value="<?php echo $customer['cep']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="campo3">Bairro</label>
                <input type="text" class="form-control" name="customer['bairro']" value="<?php echo $customer['bairro']; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="campo3">Cidade</label>
                <input type="text" class="form-control" name="customer['cidade']" value="<?php echo $customer['cidade']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="campo1">Telefone</label>
                <input type="text" class="form-control" name="customer['telefone']" value="<?php echo $customer['telefone']; ?>">
            </div>
        </div>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>