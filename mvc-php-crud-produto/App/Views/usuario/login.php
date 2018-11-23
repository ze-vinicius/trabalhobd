<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/logar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $Sessao::retornaValorFormulario('usuario'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" value="<?php echo $Sessao::retornaValorFormulario('senha'); ?>" required>
                </div>
                <input type="hidden" value="1" name="papel">
                <button type="submit" class="btn btn-success btn-sm">Entrar</button>
            </form>
            <p>Ainda não possui uma conta? <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro">Cadaste-se</a></p>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>