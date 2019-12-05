<?php
include_once 'config/config.php';

include_once 'constructor/CategoriaConstructor.php';


if (!isset($_GET['acao'])){
    $acao = 'index';
}

if ($acao == 'index'){
    $id = null;

    $catc = new CategoriaConstructor();
    $categorias = $catc->listaCategorias($id);
        
    include 'view/templates/cabecalho.php';
    include 'view/categorias/listar.php';
    include 'view/templates/rodape.php';
}

?>