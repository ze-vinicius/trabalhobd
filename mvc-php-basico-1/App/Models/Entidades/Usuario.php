<?php

namespace App\Models\Entidades;

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $usuario;
    private $senha;
    private $papel;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsuario() 
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getPapel(){
        return $this->papel;
    }
    public function setPapel($papel){
        $this->papel = $papel;
    }
}