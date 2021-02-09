<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Produto;

class ProdutoValidador{

    public function validar(Produto $produto)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($produto->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }
        
        if(empty($produto->getPreco()))
        {
            $resultadoValidacao->addErro('preco',"Preço: Este campo não pode ser vazio");
        }

        if(empty($produto->getQuantidade()))
        {
            $resultadoValidacao->addErro('quantidade',"Quantidade: Este campo não pode ser vazio");
        }

        if(empty($produto->getDescricao()))
        {
            $resultadoValidacao->addErro('descricao',"Descrição: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}