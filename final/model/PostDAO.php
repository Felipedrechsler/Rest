<?php
require_once HOMEDIR.'/config/Database.php';
class PostDAO{
    private $conexao;

    function __construct(){
        $db = new Database();
        $this->conexao = $db->conexao();
    }

    public function listaPostsPorGaleria($galeria_id){
        try{
            $sql = "select * from post where galeria_id=:galeria_id order by titulo";
            $stmt = $this->conexao->prepare($sql);

            $stmt->bindParam(':galeria_id', $galeria_id);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts;    
        }catch(PDOException $e){
            throw $e;
        }
    }

    public function getPost($post_id){
        try{
            $sql = "select post.id as id_post, post.titulo as titulo_post, post.descricao as desc_post,
                   imagem.id as id_imagem, imagem.descricao as desc_imagem, url, data, fonte from post join imagem on imagem.post_id=post.id where post.id=:id";
            $stmt = $this->conexao->prepare($sql);

            $stmt->bindParam(':id', $post_id);
            $stmt->execute();
            $imagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $imagens;    
        }catch(PDOException $e){
            throw $e;
        }

    }

}