
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
                                <a href="https://api.whatsapp.com/send?text=Acesse%20esta%20p%C3%A1gina:%20<?php echo get_permalink();?>" target="_blank"><i class="fa-brands fa-square-whatsapp"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>"  target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                                <!--<a href="#"><i class="fa-brands fa-square-instagram"></i></a> -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                            </div>
                        </div>                        
                    </div> <!-- fecha div noticia-h2 -->

                    <?php the_content(); ?>

    
      <?php 
      endwhile; ?>                                    


                      
                      <?php cats_related_post() ?>

                </div> <!-- fecha content grid -->


      </div> <!-- fecha div .noticias -->
            
  </div> <!-- fecha div main -->
  </div> <!-- fecha div misterio -->

<?php get_footer(); ?>
