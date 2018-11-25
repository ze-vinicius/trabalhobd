<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Carrinho;
use \App\Models\Entidades\Produto;

class CarrinhoValidador{

    public function validar(Carrinho $item, Produto $produto)
    {
        $resultadoValidacao = new ResultadoValidacao();
        
        if($item->getQuantidade() > $produto->getQuantidade()){
            $resultadoValidacao->addErro('Quantidade',"Quantidade insuficiente, verificar estoque do produto");
        }

        return $resultadoValidacao;
    }
}