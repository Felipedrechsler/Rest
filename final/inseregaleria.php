<?php
    include_once 'config/config.php';
    require_once 'classes/Categoria.php';
    require_once 'model/CategoriaDAO.php';

//receber os valores enviados pelo form
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];


//instanciar Galeria com os valores recebidos
    $cat = new Categoria($nome, $desc);


//instanciar o DAO
    $dao = new CategoriaDAO();
//chamar o metodo de insertGaleria() - recebe um obj tipo Galeria
    if ( $dao->insertCategoria($cat)){
        header('location: formcategoria.html');
    }else{
        echo 'Erro ao inserir';
    }

