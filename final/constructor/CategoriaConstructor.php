<?php
require_once 'model/CategoriaDAO.php';
class CategoriaConstructor{
    public function listaCategorias($id){
        $catdao = new CategoriaDAO();
        $categorias = $catdao->listaCategorias($id);
        return $categorias;
    }
}