<?php

class Categoria{
    private $id;
    private $descricao;
    private $data;
    private $categoria_id;

    function __construct($descricao, $data, $categoria_id, $id){
        $this->id = $id;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->categoria_id = $categoria_id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function setCategoriaId($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function getCategoriaId(){
        return $this->categoria_id;
    }

}