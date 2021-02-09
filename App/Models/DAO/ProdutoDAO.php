<?php

namespace App\Models\DAO;

use App\Models\Entidades\Produto;

class ProdutoDAO extends BaseDAO
{
    public  function listar($id = null)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT * FROM produto WHERE id = $id"
            );

            return $resultado->fetchObject(Produto::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM produto'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Produto::class);
        }

        return false;
    }

    public  function salvar(Produto $produto) 
    {
        try {

            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();

            return $this->insert(
                'produto',
                ":nome,:preco,:quantidade,:descricao",
                [
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                    ':quantidade'=>$quantidade,
                    ':descricao'=>$descricao
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

    public function excluir(Produto $produto)
    {
        try {
            $id = $produto->getId();

            return $this->delete('produto',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}