<?php
require_once HOMEDIR.'/config/Database.php';
require_once HOMEDIR.'/classes/Categoria.php';
class CategoriaDAO{
    private $conexao;

    function __construct(){
        $db = new Database();
        $this->conexao = $db->conexao();
    }

    public function listaCategorias($id=null){
        try{
            if(is_null($id)){
                $sql = "select * from categoria order by nome";
            }else{
                $sql = "select * from categoria where id=".$id." order by nome";
            }

            $stmt = $this->conexao->query($sql);
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;    
        }catch(PDOException $e){
            throw $e;
        }
    }

    public function insertCategoria(Categoria $categoria){
        $nome = $categoria->getNome();
        $desc = $categoria->getDescricao();
        $id = $categoria->getId();

        try{

            $sql = "insert into categoria (nome, descricao) values (:nome, :descricao)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $desc);
            $stmt->execute();
            return true;    
        }catch(PDOException $e){
            throw $e;
        }


    }

    public function deleteCategoria(Categoria $categoria){
        try{

            $sql = "delete from categoria where id=:id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $categoria->getId());
            $stmt->execute();
            return true;    
        }catch(PDOException $e){
            throw $e;
        }
    }

    public function updateCategoria(Categoria $categoria){
        try{

            $sql = "update categoria set nome=:nome, descricao=:descricao where id=:id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $categoria->getId());
            $stmt->bindValue(':nome', $categoria->getNome());
            $stmt->bindValue(':descricao', $categoria->getDescricao());
            $stmt->execute();
            return true;    
        }catch(PDOException $e){
            throw $e;
        }
    }

}