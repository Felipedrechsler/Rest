<?php
    include_once '../config/config.php';
    require_once HOMEDIR.'/classes/Categoria.php';
    require_once HOMEDIR.'/model/CategoriaDAO.php';



//receber o id enviado via GET
$id = $_GET['id'];

$categoria = new Categoria('', '', $id);
//instanciar o DAO
$dao = new CategoriaDAO();
//executar o metodo deleteCategoria($id);

try{
    if ($dao->deleteCategoria($categoria)){
    //redirecionar
        header('location: ../formcategoria.html');
    }
}catch(Exception $e){
    echo $e->getMessage();
}

