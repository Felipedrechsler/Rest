    <main class="container-fluid">
        <div id="menu-esquerdo">
            <ul>
<?php
    require_once HOMEDIR.'/model/GaleriaDAO.php';
    require_once HOMEDIR.'/model/PostDAO.php';

    foreach($categorias as $categoria){
        echo ("<li class=\"categoria\">");
        echo $categoria['nome'];
        $galc = new GaleriaDAO();
        $galerias = $galc->listaGaleriasPorCategoria($categoria['id']);
        echo ("<ul class='menu-galerias'>");
        foreach($galerias as $galeria){
            echo ("<li class=\"galeria\">");
            echo ($galeria['descricao']);
            $postc = new PostDAO();
            $posts = $postc->listaPostsPorGaleria($galeria['id']);
            echo ("<ul class='menu-posts'>");
            foreach($posts as $post){
                echo ("<li class=\"post\" id=\"{$post['id']}\">");
                echo ($post['titulo']);
                echo ("</li>");
            }
            echo ("</ul>");
                echo ("</li>");
        }
        echo ("</ul>");
        echo ("</li>");
    }
?>
            </ul>
        </div>
        <div id="direita">
            <p>A BC-Hawk tem por objetivo tornar-se um espaço para disponibilização de conteúdos de acervo histórico dos municípios da região do Vale do Itajaí.</p>
        </div>
    </main>