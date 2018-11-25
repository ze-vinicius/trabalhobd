<div class="container bg-light">
    <div class="row">
    <br>
    <?php if($Sessao::verificaUsuarioLogado() === "0"){ ?>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/produto/cadastro" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <?php }?>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['listaProdutos'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Nome</td>
                        <td class="info">Preço</td>
                        <td class="info">Quantidade</td>
                        <td class="info">Data Cadastro</td>
                        <td class="info">Sinopse</td>
                        <?php if($Sessao::verificaUsuarioLogado() === "1" || $Sessao::verificaUsuarioLogado() === "0"){?>
                            <td class="info"></td>
                        <?php }?>
                    </tr>
                    <?php
                        foreach($viewVar['listaProdutos'] as $produto) {
                    ?>
                        <tr>
                            <td><?php echo $produto->getNome(); ?></td>
                            <td>R$ <?php echo $produto->getPreco(); ?></td>
                            <td><?php echo $produto->getQuantidade(); ?></td>
                            <td><?php echo $produto->getDataCadastro()->format('d/m/Y'); ?></td>
                            <td><?php echo $produto->getDescricao();?></td>
                            <?php if($Sessao::verificaUsuarioLogado() === "0"){?>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/produto/edicao/<?php echo $produto->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/produto/exclusao/<?php echo $produto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                            <?php }else if($Sessao::verificaUsuarioLogado() === "1"){?>
                                <td>
                                <a href="http://<?php echo APP_HOST; ?>/carrinho/addCarrinho/<?php echo $produto->getId(); ?>" class="btn btn-info btn-sm <?php echo ($produto->getQuantidade() > 0) ? " ":"disabled"; ?> ">Adicionar Carrinho</a>
                                </td>
                            <?php }?>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>