<?php
require_once "InterfaceAuxiliar.php";
require_once "InterfaceClasses.php";
require_once "db/banco.php";

class Currency implements InterfaceClasses, InterfaceAuxiliar
{
    private $id;
    private $sigla;
    private $nome;

    private $crud;
    private $tabela = "currencies";
    private $idcontrole = "id";
    private $fator_busca = "sigla";
    private $num_colunas;

    public function __construct($sigla = "", $nome = "")
    {
        $this->nome = $nome;
        $this->sigla = $sigla;

        $this->crud = new Crud();
        $this->num_colunas = $this->crud->ContaColunas($this->tabela);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getColumns()
    {
        return $this->num_colunas;
    }

    public function setColumns($columns)
    {
        $this->num_colunas = $columns;
    }

    public function iniciar($id = "", $sigla = "", $nome = "")
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sigla = $sigla;
    }

    public function prepara()
    {
        $valores = array();
        $atributos = array();
        $colunas = $this->num_colunas;
        $atrib = get_object_vars($this);
        if(isset($atrib))
        {
            $i = 0;
            foreach($atrib as $key => $valor)
            {
                if ($i > 0 && $i < $colunas) {
                    if ($valor != "") {
                        $atributos[] = $key;
                        $valores[] = $valor;
                    }
                }
                $i++;
            }
        }
        return array($atributos, $valores);
    }

    // public function carregar()
    // {
    //     $atrib = get_object_vars($this);
    //     $colunas = $this->num_colunas;
    //     if($this->id != "") {
    //         $res = $this->crud->Busca;
    //     }
    // }

    public function listar($atributos="*", $where = "", $order = "") {
        return $this->crud->BuscaAtributos($atributos, $this->tabela." $where $order ");
    }

}
