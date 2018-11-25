<?php

namespace App\Models\DAO;

use App\Models\Entidades\Carrinho;

class CarrinhoDAO extends BaseDAO
{
    public  function listar($id_produto = null, $id_usuario)
    {   
        if($id_produto) {
            $resultado = $this->select(
                "SELECT  c.id_produto, p.nome as produto, COUNT(c.id) as quantidade, SUM(p.preco) as preco FROM produto AS p 
                    join carrinho AS c on (p.id = c.id_produto) 
                    join usuario as u on(c.id_usuario = u.id)
                    where c.id_produto = $id_produto and c.id_usuario = $id_usuario  group by p.id"
            );

            return $resultado->fetchObject(Carrinho::class);
        }else{
            $resultado = $this->select(
                "SELECT  c.id_produto, p.nome as produto, COUNT(c.id) as quantidade, SUM(p.preco) as preco FROM produto AS p 
                    join carrinho AS c on (p.id = c.id_produto)  
                    where c.id_usuario = $id_usuario group by p.id"
            );
            
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Carrinho::class);
        }

        return false;
    }

    public  function salvar($id_produto, $id_usuario) 
    {
        try {

            return $this->insert(
                'carrinho',
                ":id_produto,:id_usuario",
                [
                    ':id_produto'=>$id_produto,
                    ':id_usuario'=>$id_usuario,
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function atualizar(Produto $produto) 
    {
        try {

            $id             = $produto->getId();
            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();

            return $this->update(
                'produto',
                "nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                    ':quantidade'=>$quantidade,
                    ':descricao'=>$descricao,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Carrinho $carrinho)
    {
        try {
            $id = $carrinho->getIdProduto();

            return $this->delete('carrinho',"id_produto = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}