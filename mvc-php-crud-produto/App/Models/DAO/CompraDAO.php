<?php

namespace App\Models\DAO;

use App\Models\Entidades\Carrinho;

class CompraDAO extends BaseDAO
{
    public  function listar($id_usuario)
    {
        $resultado = $this->select(
            "SELECT * compras WHERE id_usuario = '$id_usuario'"
        );
        if($resultado){
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Compra::class);
        }
        return false;
    }

    public  function salvar($id_usuario, $preco)
    {
        try {

            return $this->insert(
                'compras',
                ":id_usuario,:preco",
                [
                    ':id_usuario'=>$id_usuario,
                    ':preco'=>$preco
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}