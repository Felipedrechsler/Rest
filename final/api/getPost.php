<?php
    include_once '../config/config.php';
    require_once HOMEDIR.'/model/PostDAO.php';

    if (isset($_GET['id'])){
        $id_post = $_GET['id'];
        $postDAO = new PostDAO();
        $posts = $postDAO->getPost($id_post);
        echo json_encode($posts); 
    }else{
        echo 'Galeria não informada';
    }