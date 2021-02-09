<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ProdutoDAO;
use App\Models\Entidades\Produto;
use App\Models\Validacao\ProdutoValidador;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtoDAO = new ProdutoDAO();

        self::setViewParam('listaProdutos',$produtoDAO->listar());

        $this->render('/produto/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/produto/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Produto = new Produto();
        $Produto->setNome($_POST['nome']);
        $Produto->setPreco($_POST['preco']);
        $Produto->setQuantidade($_POST['quantidade']);
        $Produto->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $produtoValidador = new ProdutoValidador();
        $resultadoValidacao = $produtoValidador->validar($Produto);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/produto/cadastro');
        }

        $produtoDAO = new ProdutoDAO();

        $produtoDAO->salvar($Produto);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto');
      
    }
    
    public function edicao($params)
    {
        $id = $params[0];

        $produtoDAO = new ProdutoDAO();

        $produto = $produtoDAO->listar($id);

        if(!$produto){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        self::setViewParam('produto',$produto);

        $this->render('/produto/editar');

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
    
    public function exclusao($params)
    {
        $id = $params[0];

        $produtoDAO = new ProdutoDAO();

        $produto = $produtoDAO->listar($id);

        if(!$produto){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        self::setViewParam('produto',$produto);

        $this->render('/produto/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $Produto = new Produto();
        $Produto->setId($_POST['id']);

        $produtoDAO = new ProdutoDAO();

        if(!$produtoDAO->excluir($Produto)){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        Sessao::gravaMensagem("Produto excluido com sucesso!");

        $this->redirect('/produto');

    }
}