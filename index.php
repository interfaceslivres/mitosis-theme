
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
        <h1 class="secoes">Notícias</h1>
        <div class="conteudo">
          <?php 
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 3,
            )); 
            if ( $the_query->have_posts() ) : $postCount = 0; while ( $the_query->have_posts() ) : $postCount++; $the_query->the_post();  
          
            if($postCount == 1) { ?>

              <div class="noticias-coluna-unica">
                  <?php if ( has_post_thumbnail()) : ?>
                    <div class="noticia-wrapper">
                      <div class="rotulo-claro">
                        <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                        <div class="categorias">
                          <?php
                          // Obtém as categorias do post
                          $categories = get_the_category();

                          // Verifica se existem categorias
                          if ($categories) {
                              // Limita a exibição a duas categorias
                              $categories = array_slice($categories, 0, 2);

                              // Loop pelas categorias
                              foreach ($categories as $category) {
                                  // Exibe o nome da categoria como um link
                                  echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                  // Adiciona uma vírgula após a categoria, exceto pela última
                                  if (next($categories)) {
                                      echo ', ';
                                  }
                              }
                          }
                          ?>
                        </div><!-- fecha div categorias -->
                      </div><!-- fecha div rotulo -->
                      <a href="noticia.html" class="noticia-com-img camada-1" style="
                      background-image:
                      linear-gradient(180deg, rgba(0,   0,   0, 0.5) 0%, rgba(0, 0, 0, 0) 50%), 
                      linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #ffffff 85%),
                      url(<?php the_post_thumbnail_url(); ?>); 
                      background-position: inherit;
                      ">
                        <div class="background-wrapper2">                  
                          <div class="noticia-com-img-titulo"><?php the_title(); ?></div>
                        </div>                          
                      </a>
                    </div>
                  <?php else : ?> 
                    <div class="noticia-wrapper">
                      <div class="rotulo">
                        <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                        <div class="categorias">
                          <?php
                          // Obtém as categorias do post
                          $categories = get_the_category();

                          // Verifica se existem categorias
                          if ($categories) {
                              // Limita a exibição a duas categorias
                              $categories = array_slice($categories, 0, 2);

                              // Loop pelas categorias
                              foreach ($categories as $category) {
                                  // Exibe o nome da categoria como um link
                                  echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                  // Adiciona uma vírgula após a categoria, exceto pela última
                                  if (next($categories)) {
                                      echo ', ';
                                  }
                              }
                          }
                          ?>
                        </div><!-- fecha div categorias -->
                      </div><!-- fecha div rotulo -->
                      <a class="noticia-sem-img camada-1" href="#"> 
                        <div class="noticia-sem-img-titulo" id="noticia-principal"><?php the_title(); ?></div>
                      </a>
                    </div>
      <?php endif; ?>
              </div> <!-- fim de noticias-coluna-unica -->
              
              <div class="noticias-coluna">
                <?php }
                    elseif ($postCount == 2) {
                      if ( has_post_thumbnail()) : ?>      
                        <div class="noticia-wrapper">
                          <div class="rotulo-claro">
                            <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                            <div class="categorias">
                              <?php
                              // Obtém as categorias do post
                              $categories = get_the_category();

                              // Verifica se existem categorias
                              if ($categories) {
                                  // Limita a exibição a duas categorias
                                  $categories = array_slice($categories, 0, 2);

                                  // Loop pelas categorias
                                  foreach ($categories as $category) {
                                      // Exibe o nome da categoria como um link
                                      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                      // Adiciona uma vírgula após a categoria, exceto pela última
                                      if (next($categories)) {
                                          echo ', ';
                                      }
                                  }
                              }
                              ?>
                            </div><!-- fecha div categorias -->
                          </div><!-- fecha div rotulo -->
                          <a href="noticia.html" class="noticia-com-img camada-1" style="
                          background-image:
                          linear-gradient(180deg, rgba(0,   0,   0, 0.5) 0%, rgba(0, 0, 0, 0) 50%), 
                          linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #ffffff 85%),
                          url(<?php the_post_thumbnail_url(); ?>)">
                            <div class="background-wrapper">                  
                              <div class="noticia-com-img-titulo"><?php the_title(); ?></div>
                            </div>                          
                          </a>
                        </div>  
                <?php else : ?>
                        <div class="noticia-wrapper">
                          <div class="rotulo">
                            <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                            <div class="categorias">
                              <?php
                              // Obtém as categorias do post
                              $categories = get_the_category();

                              // Verifica se existem categorias
                              if ($categories) {
                                  // Limita a exibição a duas categorias
                                  $categories = array_slice($categories, 0, 2);

                                  // Loop pelas categorias
                                  foreach ($categories as $category) {
                                      // Exibe o nome da categoria como um link
                                      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                      // Adiciona uma vírgula após a categoria, exceto pela última
                                      if (next($categories)) {
                                          echo ', ';
                                      }
                                  }
                              }
                              ?>
                            </div><!-- fecha div categorias -->
                          </div><!-- fecha div rotulo -->
                          <a href="noticia.html" class="noticia-sem-img camada-1">              
                            <div class="noticia-sem-img-titulo"><?php the_title(); ?></div>
                          </a>
                        </div>
              <?php endif;}
                  elseif ($postCount == 3) {
                      if ( has_post_thumbnail()) : ?>      
                        <div class="noticia-wrapper">
                          <div class="rotulo-claro">
                            <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                            <div class="categorias">
                              <?php
                              // Obtém as categorias do post
                              $categories = get_the_category();

                              // Verifica se existem categorias
                              if ($categories) {
                                  // Limita a exibição a duas categorias
                                  $categories = array_slice($categories, 0, 2);

                                  // Loop pelas categorias
                                  foreach ($categories as $category) {
                                      // Exibe o nome da categoria como um link
                                      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                      // Adiciona uma vírgula após a categoria, exceto pela última
                                      if (next($categories)) {
                                          echo ', ';
                                      }
                                  }
                              }
                              ?>
                            </div><!-- fecha div categorias -->
                          </div><!-- fecha div rotulo -->
                          <a href="noticia.html" class="noticia-com-img camada-1" style="
                          background-image:
                          linear-gradient(180deg, rgba(0,   0,   0, 0.5) 0%, rgba(0, 0, 0, 0) 50%), 
                          linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #ffffff 85%),
                          url(<?php the_post_thumbnail_url(); ?>)">
                            <div class="background-wrapper">                  
                              <div class="noticia-com-img-titulo"><?php the_title(); ?></div>
                            </div>                          
                          </a>
                        </div>  
                <?php else : ?>
                        <div class="noticia-wrapper">
                          <div class="rotulo">
                            <div><?php echo get_the_date( 'd \d\e F Y' ); ?></div>
                            <div class="categorias">
                              <?php
                              // Obtém as categorias do post
                              $categories = get_the_category();

                              // Verifica se existem categorias
                              if ($categories) {
                                  // Limita a exibição a duas categorias
                                  $categories = array_slice($categories, 0, 2);

                                  // Loop pelas categorias
                                  foreach ($categories as $category) {
                                      // Exibe o nome da categoria como um link
                                      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

                                      // Adiciona uma vírgula após a categoria, exceto pela última
                                      if (next($categories)) {
                                          echo ', ';
                                      }
                                  }
                              }
                              ?>
                            </div><!-- fecha div categorias -->
                          </div><!-- fecha div rotulo -->
                          <a href="noticia.html" class="noticia-sem-img camada-1">              
                            <div class="noticia-sem-img-titulo"><?php the_title(); ?></div>
                          </a>
                        </div>

              <?php endif; } 
            endwhile; else : endif; ?>
              </div> <!-- fecha noticias coluna -->            
        </div> <!-- fecha div .conteudo -->


        <div class="link-wrapper justify-end">
          <a class="mais-link" href="noticias.html">Mais Notícias</a>           
        </div>
      </div> <!-- fecha div .noticias -->











    <div class="curso">
      <h2 class="secoes">Comunicação em Mídias digitais</h2>

      <div class="youtube"><iframe width="100%" height="100%"
         src="https://www.youtube.com/embed/XUCxGYSJEDY?autoplay=0&mute=1"
         title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; web-share" allowfullscreen></iframe>
      </div>

      <div class="text-curso">

        <h3>O que faz um Comunicador em Mídias Digitais?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>

        <h3>Atribuições em Comunicador em Mídias Digitais?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>

        <h3>Mercado de trabalho para um Comunicador em Mídias Digitais?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>


      </div> <!-- fecha div text-curso -->
    </div> <!-- fecha div curso -->
    <div class="mais">
      <div class="mapa">

        <div class="mapa-titulo">
          <h2>Mapa</h2>
        </div>

        <div class="mapa-img">
          <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111.87252228998113!2d-34.84983169399343!3d-7.137336889729705!2m3!1f22.312500000000025!2f48.49688112803378!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x7acc2b97fcc474f%3A0x7330f1f2dbd68687!2sDEMID - Departamento de Mídias Digitais!5e1!3m2!1sen!2sbr!4v1682431792367!5m2!1sen!2sbr" width="100%" height="100%" frameborder="0"><a href="https://www.maps.ie/distance-area-calculator.html">area maps</a></iframe>
        </div>

      </div>

      <div class="text-ufpb">

        <div class="text-ufpb-titulo">
          <h2>UFPB</h2>
        </div>

        <div class="text-ufpb-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
        </div>

        <div class="text-ufpb-link">
          <a class="mais-link" href="#">Apresentação</a>
          <a class="mais-link" href="#">Projeto Político-Pedagógico</a>
        </div>
      </div>

    </div> <!-- fecha div mais -->

  </div> <!-- fecha div main -->
</div> <!-- fecha div misterio -->

<div class="imagem-curso">
  <img src="img/banner.jpg" alt="frente predio DEMID">
</div>



<?php get_footer(); ?>
