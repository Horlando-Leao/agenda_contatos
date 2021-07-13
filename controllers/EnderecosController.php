<?php

include 'models/Endereco.php';
include_once 'models/Contato.php';
//require 'utils/UtilDateTime.php';

class EnderecosController extends Controller
{

    /**
     * Lista os enderecos
     */
    public function listar($id_contato)
    {
        $enderecos = Endereco::all($id_contato);
        return $this->view('gradeEndereco', ['enderecos' => $enderecos, 'id_contato' => $id_contato]);
    }

    /**
     * Mostrar formulario para criar um novo endereco
     */
    public function criar($id_contato)
    {
        return $this->view('formEndereco', ['id_contato'=>$id_contato]);
    }

    /**
     * Mostrar formulário para editar um endereco
     */
    public function editar($dados)
    {
        //var_dump($dados);
        $id      = (int) $dados['id'];
        $endereco = Endereco::find($id);
        $id_contato = $dados['id_contato'];

        //var_dump($this);
        //tela fica em branco
        return $this->view('formEndereco', ['endereco' => $endereco, 'id_contato' => $id_contato ]);
        
        //tela fica aparece tudo, mas o botão de voltar não funciona
        //return $this->view('formEndereco', ['endereco' => $endereco ]);
    }

    /**
     * Salvar o endereco submetido pelo formulário
     */
    public function salvar($id_contato)
    {
        $endereco             = new Endereco;
        $endereco->cep        = $this->request->cep;
        $endereco->pais       = $this->request->pais;
        $endereco->uf         = $this->request->uf;
        $endereco->localidade = $this->request->localidade;
        $endereco->bairro     = $this->request->bairro;
        $endereco->logradouro = $this->request->logradouro;
        $endereco->id_contato = (int) $this->request->id_contato;


        if ($endereco->save()) {
            //return $this->listar(intval($id_contato));
            //require_once 'models/Contato.php';
            $id      = (int) $endereco->id_contato;
            $contato = Contato::find($id);
            return $this->view('formContato', ['contato' => $contato]);
        }
    }

    /**
     * Atualizar o endereco conforme dados submetidos
     */
    public function atualizar($dados)
    {
        date_default_timezone_set('America/Recife');
        $dateNow = new DateTime();
        $dateNow = $dateNow->format('Y-m-d H:i:s');

        $id                   = (int) $dados['id'];
        $endereco             = Endereco::find($id);
        $endereco->cep        = $this->request->cep;
        $endereco->pais       = $this->request->pais;
        $endereco->uf         = $this->request->uf;
        $endereco->localidade = $this->request->localidade;
        $endereco->bairro     = $this->request->bairro;
        $endereco->logradouro = $this->request->logradouro;
        $endereco->save();

        
        $idCon      = (int) $dados['id_contato'];
        $contato = Contato::find($idCon);
        return $this->view('formContato', ['contato' => $contato]);
    }

    /**
     * Apagar um endereco conforme o id informado
     */
    public function excluir($dados)
    {
        $idTel     = (int) $dados['id'];
        $endereco = Endereco::destroy($idTel);

        $idCon      = (int) $dados['id_contato'];
        $contato = Contato::find($idCon);
        return $this->view('formContato', ['contato' => $contato]);
    }
}