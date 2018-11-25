<?php

namespace App\Models\Entidades;

use DateTime;

class Carrinho
{
    private $id_produto;
    private $produto;
    private $quantidade;
    private $preco;

    public function getIdProduto()
    {
        return $this->id_produto;
    }

    public function setIdProduto($id_produto)
    {
        $this->id_produto = $id_produto;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setPoduto($produto)
    {
        $this->produto = $produto;
    }


}