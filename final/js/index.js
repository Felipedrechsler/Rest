$(document).ready(function(){
    $(".categoria").click(function(e){
        e.stopPropagation();
        $(this).find(".menu-galerias").slideToggle(500);
    });
    
    $(".galeria").click(function(e){
        e.stopPropagation();
        $(this).find(".menu-posts").slideToggle(500);
    });

    $(".post").click(function(e){
        e.stopPropagation();
        $.getJSON('api/getPost.php?id='+$(this).attr("id"), function(result){
           items = [];
           items.push('<h1>'+result[0].titulo_post+'</h1>');
           items.push('<p>'+result[0].desc_post+'</p>');
           $.each(result, function (key, imagem){
               items.push('<div class="imagem-post"><p>'+imagem.desc_imagem+'</p><img src="'+imagem.url+'"/><p>Fonte: '+imagem.fonte+'</p><hr></div>');
           });
  
            $("#direita").html(items);          
        });
    });
})