<?php

include 'models/Telefone.php';
include_once 'models/Contato.php';
//require 'utils/UtilDateTime.php';

class TelefonesController extends Controller
{

    /**
     * Lista os telefones
     */
    public function listar($id_contato)
    {
        $telefones = Telefone::all($id_contato);
        return $this->view('gradeTelefone', ['telefones' => $telefones, 'id_contato' => $id_contato]);
    }

    /**
     * Mostrar formulario para criar um novo telefone
     */
    public function criar($id_contato)
    {
        return $this->view('formTelefone', ['id_contato'=>$id_contato]);
    }

    /**
     * Mostrar formulário para editar um telefone
     */
    public function editar($dados)
    {
        //var_dump($dados);
        $id      = (int) $dados['id'];
        $telefone = Telefone::find($id);
        $id_contato = $dados['id_contato'];

        //var_dump($this);
        //tela fica em branco
        return $this->view('formTelefone', ['telefone' => $telefone, 'id_contato' => $id_contato ]);
        
        //tela fica aparece tudo, mas o botão de voltar não funciona
        //return $this->view('formTelefone', ['telefone' => $telefone ]);
    }

    /**
     * Salvar o telefone submetido pelo formulário
     */
    public function salvar($id_contato)
    {
        $telefone            = new Telefone;
        $telefone->telefone  = $this->request->telefone;
        $telefone->ativo     = $this->request->ativo;
        $telefone->id_contato = (int) $this->request->id_contato;


        if ($telefone->save()) {
            //return $this->listar(intval($id_contato));
            //require_once 'models/Contato.php';
            $id      = (int) $telefone->id_contato;
            $contato = Contato::find($id);
            return $this->view('formContato', ['contato' => $contato]);
        }
    }

    /**
     * Atualizar o telefone conforme dados submetidos
     */
    public function atualizar($dados)
    {
        date_default_timezone_set('America/Recife');
        $dateNow = new DateTime();
        $dateNow = $dateNow->format('Y-m-d H:i:s');

        $id                        = (int) $dados['id'];
        $telefone                   = Telefone::find($id);
        $telefone->telefone         = $this->request->telefone;
        $telefone->ativo            = $this->request->ativo;
        $telefone->data_atualizacao = $dateNow;
        $telefone->save();

        //return $this->listar($dados['id_contato']$id_contato);
        $idCon      = (int) $dados['id_contato'];
        $contato = Contato::find($idCon);
        return $this->view('formContato', ['contato' => $contato]);
    }

    /**
     * Apagar um telefone conforme o id informado
     */
    public function excluir($dados)
    {
        $idTel     = (int) $dados['id'];
        $telefone = Telefone::destroy($idTel);

        $idCon      = (int) $dados['id_contato'];
        $contato = Contato::find($idCon);
        return $this->view('formContato', ['contato' => $contato]);
    }
}