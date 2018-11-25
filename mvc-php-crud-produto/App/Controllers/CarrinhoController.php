<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ProdutoDAO;
use App\Models\Entidades\Produto;
use App\Models\Validacao\carrinhoValidador;
use App\Models\Entidades\Carrinho;
use App\Models\DAO\CarrinhoDAO;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinhoDAO = new CarrinhoDAO();
        
        self::setViewParam('carrinho',$carrinhoDAO->listar($id = null, Sessao::getUsuarioLogado()));
        $this->render('/carrinho/index');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function cadastro()
    {
        $this->render('/produto/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function comprar()
    {   
        
        $carrinhoDAO = new CarrinhoDAO();
        self::setViewParam('carrinho',$carrinhoDAO->listar($id = null, Sessao::getUsuarioLogado()));
        $carrinho = $carrinhoDAO->listar($id = null, Sessao::getUsuarioLogado());
        
        if(count($carrinho)){
            $carrinhoValidador = new CarrinhoValidador();
            $produtoDAO = new ProdutoDAO();
            foreach($carrinho as $item){
                
                $resultadoValidacao = $carrinhoValidador->validar($item, $produtoDAO->listar($item->getIdProduto()));
        
                if($resultadoValidacao->getErros()){
                    Sessao::gravaErro($resultadoValidacao->getErros());
                    $this->redirect('/carrinho');
                }
            }
            
            $this->render('/carrinho/comprar');
        }else{
            Sessao::gravaMensagem("Carrinho vazio!");
            $this->redirect('/produto');
        }
        Sessao::limpaErro();
        
    }
    
    public function efetuarCompra()
    {

        $id = Sessao::getUsuarioLogado();

        $carrinhoDAO = new CarrinhoDAO();
        $produtoDao = new ProdutoDAO();

        $lista = $carrinhoDAO->listar(null, $id);
        
        foreach($lista as $carrinho)
        {
            $produto = $produtoDao->listar($carrinho->getIdProduto());

            if(!empty($produto))
            {
                $produto->setQuantidade($produto->getQuantidade() - 1);
                $produtoDao->atualizar($produto);
                $carrinhoDAO->excluir($carrinho);
            }
        }

        self::setViewParam('produto',$produto);

        $this->redirect('/produto');

        Sessao::limpaMensagem();

    }

    public function atualizar()
    {

        $Produto = new Produto();
        $Produto->setId($_POST['id']);
        $Produto->setNome($_POST['nome']);
        $Produto->setPreco($_POST['preco']);
        $Produto->setQuantidade($_POST['quantidade']);
        $Produto->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $produtoValidador = new ProdutoValidador();
        $resultadoValidacao = $produtoValidador->validar($Produto);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/produto/edicao/'.$_POST['id']);
        }

        $produtoDAO = new ProdutoDAO();

        $produtoDAO->atualizar($Produto);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto');

    }
    
    public function remover($params)
    {
        $id = $params[0];

        $carrinhoDAO = new CarrinhoDAO();

        $produto = $carrinhoDAO->listar($id, Sessao::getUsuarioLogado());

        if(!$produto){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/carrinho');
        }

        self::setViewParam('produtoCarrinho',$produto);

        $this->render('/carrinho/remover');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }

    public function excluir()
    {
        $carrinho = new Carrinho();
        $carrinho->setIdProduto($_POST['id']);

        $carrinhoDAO = new CarrinhoDAO();

        if(!$carrinhoDAO->excluir($carrinho)){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        Sessao::gravaMensagem("Produto excluido com sucesso!");

        $this->redirect('/carrinho');

    }

    public function addCarrinho($params)
    {
        $id_produto = $params[0];

        $carrinhoDAO = new CarrinhoDAO();

        $carrinhoDAO->salvar($id_produto,Sessao::getUsuarioLogado());

        echo "<script> alert('Adicionado com sucesso!')</script>";
      
        $this->redirect('/produto');

        

    }
     
}