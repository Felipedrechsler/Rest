<?php
include_once '../config/config.php';
require_once HOMEDIR.'/model/CategoriaDAO.php';
$dao = new CategoriaDAO();
$cats = $dao->listaCategorias();
echo json_encode($cats);