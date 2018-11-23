<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class UsuarioController extends Controller
{
    public function cadastro()
    {
        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }
    
    public function logar()
    {
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuarioLogin($_POST['usuario'], md5($_POST['senha']));

        
        if(!empty($usuario))
        {
            Sessao::login($usuario);
            $this->redirect('/home');
        }else
        {
            Sessao::gravaMensagem("usario ou senha incorretos");
            $this->redirect('/usuario/login');
        }

    }

    public function deslogar()
    {
        Sessao::deslogar();
        $this->redirect('/home');
    }

    public function salvar()
    {
        $Usuario = new Usuario();
        $Usuario->setNome($_POST['nome']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setUsuario($_POST['usuario']);
        $Usuario->setSenha(md5($_POST['senha']));
        $Usuario->setPapel($_POST['papel']);
        
        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($_POST['email'])){
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/cadastro');
        }
        if($usuarioDAO->verificaUsuario($_POST['usuario'])){
            Sessao::gravaMensagem("Usuário existente");
            $this->redirect('/usuario/cadastro');
        }

        if($usuarioDAO->salvar($Usuario)){
            $this->redirect('/usuario/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/usuario/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/usuario/cadastro');
    }
    public function login()
    {
        $this->render('/usuario/login');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

}