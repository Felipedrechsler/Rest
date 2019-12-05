<?php 
header("content-type: Application/json");

include_once '../config/config.php';
require_once HOMEDIR.'/model/CategoriaDAO.php';

switch($_SERVER['REQUEST_METHOD']){
	

	case 'GET':
		$dao = new CategoriaDAO();
		$cats = $dao->listaCategorias();
		echo json_encode($cats);
		break;

	case 'POST':
		$json = file_get_contents("php://input");
		$dados = json_decode($json);
//		print_r($dados);

		//instaciar obj tipo categoria
		$categoria = new Categoria($dados->nome, $dados->descricao);
//		print_r($categoria);

		//insert do dao, que recebe um obj tipo categoria
		$dao = new CategoriaDAO();
		try{
			$dao->insertCategoria($categoria);
			echo json_encode(array('mensagem'=> 'Categoria criada'));
			header("HTTP/1.1 201");
		}catch(Exception $e){
			echo json_encode(array('mensagem'=> 'Erro ao criar Categoria '. $e->getMessage));			
		}

		break;

	case 'PUT':
		$json = file_get_contents("php://input");
		$dados = json_decode($json);
//		print_r($dados);
		$categoria = new Categoria($dados->nome, $dados->descricao, $_GET['id']);
		//insert do dao, que recebe um obj tipo categoria
		$dao = new CategoriaDAO();
		try{
			$dao->updateCategoria($categoria);
			echo json_encode(array('mensagem'=> 'Categoria alterada'));
		}catch(Exception $e){
			echo json_encode(array('mensagem'=> 'Erro ao alterar Categoria '. $e->getMessage));			
		}

		break;

	case 'DELETE':
		$categoria = new Categoria(null , null, $_GET['id']);
		//insert do dao, que recebe um obj tipo categoria
		$dao = new CategoriaDAO();
		try{
			$dao->deleteCategoria($categoria);
			echo json_encode(array('mensagem'=> 'Categoria excluida'));
		}catch(Exception $e){
			echo json_encode(array('mensagem'=> 'Erro ao excluir Categoria '. $e->getMessage));			
		}
		break;


	
}
 