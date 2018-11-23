<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">Devmedia</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>" >Home</a>
                </li>
                <li <?php if($viewVar['nameController'] == "ProdutoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto" >Lista de Produtos</a>
                </li>
                <?php if($Sessao::verificaUsuarioLogado() === "0") {?>
                <li <?php if($viewVar['nameController'] == "ProdutoController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto/cadastro" >Cadastro de Produto</a>
                </li>
                <?php }?>
               <?php if($Sessao::verificaUsuarioLogado() === "") {?>
                <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/usuario/login" >Entrar</a>
                </li>
               <?php } else {?>
                <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/usuario/deslogar" >Sair</a>
                </li>
               <?php }?>
            </ul>
        </div>
    </div>
</nav>


