
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
      <div class="corpo" id="noticias">
            <div class="corpo-grid">
                <div class="content-grid">
                    <h1>Notícias</h1>
                    <div class="cards-lista">
                        <div class="noticia-wrapper">
                            <div class="rotulo">
                                <div>15 de Setembro de 2022</div>
                                <div><a href="ufpb.br">Notícia</a>, <a href="ufpb.br">Calamidade</a></div>
                            </div>
                            <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="
                            background-image: linear-gradient(270deg, rgba(255, 255, 255, 0) 20%, #fff 25%), url(<?php the_post_thumbnail_url(); ?>)">
                                <div class="background-wrapper">                  
                                <div class="noticia-com-img-titulo">Resultado final do concurso de "Marketing Digital e Empreendedorismo"</div>
                                </div>                          
                            </a>
                        </div>
              
                        <div class="noticia-wrapper">
                            <div class="rotulo">
                                <div>15 de Setembro de 2022</div>
                                <div><a href="ufpb.br">Notícia</a>, <a href="ufpb.br">Calamidade</a></div>
                            </div>
                            <a href="noticia.html" class="noticia-sem-img camada-1">              
                                <div class="noticia-sem-img-titulo">Resultado final do concurso de "Áudio Digital"</div>              
                            </a>
                        </div>
                        <div class="paginas-nav">
                            <a class="clickable-wrapper" href="#" id="seta-anterior">Anterior</a>
                            <div class="paginas-numeros">
                                <div class="clickable-wrapper">1</div>
                                <a class="clickable-wrapper pagina-link-nav" href="#">2</a>
                                <a class="clickable-wrapper pagina-link-nav" href="#">3</a>
                                <div class="clickable-wrapper">...</div>
                                <a class="clickable-wrapper pagina-link-nav" href="#">7</a>
                            </div>                            
                            <a class="clickable-wrapper" href="#" id="seta-proximo">Próxma</a>


                        </div>
                    </div>                    
                </div>
            </div>          
        </div>
    </div>
    </div>
</div>

<?php get_footer(); ?>
