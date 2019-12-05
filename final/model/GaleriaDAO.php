<?php
require_once 'config/Database.php';
class GaleriaDAO{
    private $conexao;

    function __construct(){
        $db = new Database();
        $this->conexao = $db->conexao();
    }

    public function listaGaleriasPorCategoria($categoria_id){
        try{
            $sql = "select * from galeria where categoria_id=:categoria_id order by descricao";
            $stmt = $this->conexao->prepare($sql);

            $stmt->bindParam(':categoria_id', $categoria_id);
            $stmt->execute();
            $galerias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $galerias;    
        }catch(PDOException $e){
            throw $e;
        }
    }
}