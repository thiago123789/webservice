<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

    <h1>Administração</h1>
    <hr />

<?php if ($db) : ?>

    <div class="row">

        <!-- BOTÃO 'NOVO CLIENTE' REMOVIDO
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="customers/add.php" class="btn btn-primary">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Novo Cliente</p>
                    </div>
                </div>
            </a>
        </div>

        -->


        <!-- BOTÃO CLIENTES -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="customers" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Clientes</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTÃO GASTRONOMIA -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-cutlery fa-5x" aria-hidden="false"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Gastronomia</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTÃO HOTEIS E POUSADAS -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-bed fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Hoteis e Pousadas</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTÃO TURISMO -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-cutlery fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Turismo</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTÃO SERVICOS -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-cutlery fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Serviços</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTÃO SAUDE -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-plus fa-5x" style="color:#ce0e0c" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Saúde</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTAO PROMOÇÕES -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-star fa-5x" style="color:#FEEF00" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Promoçoes</p>
                    </div>
                </div>
            </a>
        </div>


        <!-- BOTAO GOVERNO -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-university fa-5x" style="color: gray;"aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Governo</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTAO INFORMACOES -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-info-circle fa-5x" style="color: darkblue;"aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Informações</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTAO EVENTOS -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-info-circle fa-5x" style="color: darkblue;"aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Eventos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTAO INFORMACOES -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-phone fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Telefones Úteis</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BOTAO COMERCIO -->
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="#" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Comércio</p>
                    </div>
                </div>
            </a>
        </div>



    </div>


<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>