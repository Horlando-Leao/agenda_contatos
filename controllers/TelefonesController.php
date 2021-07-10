<?php

include 'models/Telefone.php';

class TelefonesController extends Controller
{

    /**
     * Lista os contatos
     */
    public function listar()
    {
        $telefones = Telefone::all();
        return $this->view('grade', ['contatos' => $telefones]);
    }

    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::find($id);

        return $this->view('form', ['contato' => $contato]);
    }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $contato           = new Contato;
        $contato->nome     = $this->request->nome;
        $contato->ativo    = $this->request->ativo;
        $contato->email    = $this->request->email;
        $contato->senha    = $this->request->senha;

        if ($contato->save()) {
            return $this->listar();
        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        date_default_timezone_set('America/Recife');
        $dateNow = new DateTime();
        $dateNow = $dateNow->format('Y-m-d H:i:s');

        $id                = (int) $dados['id'];
        $contato           = Contato::find($id);
        $contato->nome     = $this->request->nome;
        $contato->ativo    = $this->request->ativo;
        $contato->email    = $this->request->email;
        $contato->senha    = $this->request->senha;
        $contato->data_atualizacao = $dateNow;
        $contato->save();

        return $this->listar();
    }

    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::destroy($id);
        return $this->listar();
    }
}