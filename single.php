
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
        
          <div class="content-grid">


      <?php
      while ( have_posts() ) :
      the_post(); ?>

                    <h1 class="noticia-titulo"><?php the_title(); ?></h1>
                    <div class="noticia-h2">
                        <div>
                            <div><?php echo get_the_date( 'd \d\e F Y' ); ?><!-- - Por Nome do Autor --></div>
                            <div class="noticia-categorias">Categorias:
                              <?php
                              // Obtém as categorias do post
                              $categories = get_the_category();

                              // Verifica se existem categorias
                              //if ($categories) {
                                  // Limita a exibição a duas categorias
                                  //$categories = array_slice($categories, 0, 2);

                                  // Loop pelas categorias
                                  foreach ($categories as $category) {
                                      // Exibe o nome da categoria como um link
                                      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                      // Adiciona uma vírgula após a categoria, exceto pela última
                                      if (next($categories)) {
                                          echo ', ';
                                      }
                                  }
                              //}
                              ?>
                            </div><!-- fecha div categorias -->
                        </div><!-- fecha div avulsa -->                     
                        
                        <div class="noticia-compartilhe">
                            <div>Compartilhe:</div>
                            <div class="redes-sociais noticia-redes">
                                <a href="#"><i class="fa-brands fa-square-whatsapp"></i></a>
                                <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                            </div>
                        </div>                        
                    </div> <!-- fecha div noticia-h2 -->

                    <?php the_content(); ?>

                    <div class="noticia-links-relacionados">
                        <h2>Arquivos</h2>
                        <a class="noticia-link-relacionado" href="#">https://mobile.fraudes.com/cdn-content/manual_v2.pdf?id=7dc68bDB879D68BC</a>                    
                        <a class="noticia-link-relacionado" href="#">Manual de como se defender da nova espécie</a>
                    </div>
    
      <?php 
      endwhile; ?>                                    

                    <h2>Outras Notícias</h2>

                    <div class="noticias-relacionadas">
                      
                      <?php cats_related_post() ?>


                    </div> 
                </div> <!-- fecha content grid -->


      </div> <!-- fecha div .noticias -->
            
  </div> <!-- fecha div main -->
  </div> <!-- fecha div misterio -->

<?php get_footer(); ?>
