<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <div class="container">

        <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>" >
            <img src="http://<?php echo APP_HOST; ?>/public/img/icone.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Cômica
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active nav-item" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>" class="nav-link">Home</a>
                </li>
                <li <?php if($viewVar['nameController'] == "ProdutoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active nav-item" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto" class="nav-link">Lista de Produtos</a>
                </li>
                <?php if($Sessao::verificaUsuarioLogado() === "0") {?>
                <li <?php if($viewVar['nameController'] == "ProdutoController" && $viewVar['nameAction'] == "cadastro") { ?> class="active nav-item" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto/cadastro" class="nav-link">Cadastro de Produto</a>
                </li>
                <?php }?>
            </ul>
            <ul class="navbar-nav mr-0">
                <?php if($Sessao::verificaUsuarioLogado() === "") {?>
                    <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active nav-item" <?php } ?>>
                        <a class="btn btn-success btn-sm my-2 my-sm-0" href="http://<?php echo APP_HOST; ?>/usuario/login" >Entrar</a>
                    </li>
                <?php } else {?>
                    <li  <?php if($viewVar['nameController'] == "CarrinhoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active nav-item" <?php } ?>>
                        <a  href="http://<?php echo APP_HOST; ?>/carrinho" class="nav-link" >carrinho</a>
                    </li>
                    <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active nav-item" <?php } ?>>
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="http://<?php echo APP_HOST; ?>/usuario/deslogar" class="nav-link">Sair</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>


