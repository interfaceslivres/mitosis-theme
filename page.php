
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
        
          <div class="content-grid">


      <?php
      while ( have_posts() ) :
      the_post(); ?>

                    <h1 class="noticia-titulo"><?php the_title(); ?></h1>

                    <?php the_content(); ?>

                     <!-- <div class="noticia-h2">
                        <div>
                        </div>                   
                        
                        <div class="noticia-compartilhe">
                            <div>Compartilhe:</div>
                            <div class="redes-sociais noticia-redes">
                                <a href="#"><i class="fa-brands fa-square-whatsapp"></i></a>
                                <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                            </div>
                        </div>                        
                    </div> fecha div noticia-h2 -->
    
      <?php 
      endwhile; ?>                                    

                </div> <!-- fecha content grid -->


      </div> <!-- fecha div .noticias -->
            
  </div> <!-- fecha div main -->
  </div> <!-- fecha div misterio -->

<?php get_footer(); ?>
