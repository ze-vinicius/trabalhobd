<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
    public function verificaUsuario($usuario)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE login = '$usuario' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $login     = $usuario->getUsuario();
            $senha     = $usuario->getSenha();
            $papel     = $usuario->getPapel();

            return $this->insert(
                'usuario',
                ":nome,:email,:login,:senha,:papel",
                [
                    ':nome'=>$nome,
                    ':email'=>$email,
                    ':login'=>$login,
                    ':senha'=>$senha,
                    ':papel'=>$papel
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}