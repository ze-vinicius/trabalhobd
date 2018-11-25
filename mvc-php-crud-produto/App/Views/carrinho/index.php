<div class="container">
    <div class="row">
    <br>
   
    <div class="col-md-12">
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php }?>
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-info" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['carrinho'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Nome</td>
                        <td class="info">Quantidade</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['carrinho'] as $produto) {
                    ?>
                        <tr>
                            <td><?php echo $produto->getProduto(); ?></td>
                            <td><?php echo $produto->getQuantidade(); ?></td>
                            <td><a href="http://<?php echo APP_HOST; ?>/carrinho/remover/<?php echo $produto->getIdProduto(); ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
                <a href="http://<?php echo APP_HOST; ?>/carrinho/efetuarCompra/" class="btn btn-success btn-sm">comprar</a>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>