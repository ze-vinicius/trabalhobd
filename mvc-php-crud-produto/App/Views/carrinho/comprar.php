<div class="container bg-light">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Comprar Produtos do carrinho</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/carrinho/efetuarCompra" method="post" id="produtoCarrinho">

                <div class="panel panel-danger">
                    <div class="panel-body">
                        total da compra: R$  <?php  echo (double)$viewVar['carrinhoTotal']; ?> 
                    </div>
                    <div class="panel-footer"> 
                        <button type="submit" class="btn btn-danger btn-sm">Comprar</button>
                        <a href="http://<?php echo APP_HOST; ?>/carrinho/" class="btn btn-info btn-sm">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
