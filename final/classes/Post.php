<?php

class Post{
    private $id;
    private $titulo;
    private $descricao;
    private $galeria_id;

    function __construct($titulo, $descricao, $galeria_id, $id){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->galeria_id = $galeria_id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setGaleriaId($galeria_id){
        $this->galeria_id = $galeria_id;
    }

    public function getGaleriaId(){
        return $this->galeria_id;
    }

}