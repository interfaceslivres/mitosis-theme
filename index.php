
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
                      <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="
                      background-image:
                      linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0px, rgba(0, 0, 0, 0) 50px),
                      linear-gradient(0deg, #fff 25px, rgba(0, 0, 0, 0) 100px)
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
                      <a class="noticia-sem-img camada-1" href="<?php the_permalink();?>">
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
                          <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="
                          background-image:
                          linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0px, rgba(0, 0, 0, 0) 50px),
                          linear-gradient(0deg, #fff 25px, rgba(0, 0, 0, 0) 100px)
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
                          <a href="<?php the_permalink();?>" class="noticia-sem-img camada-1">
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
                          <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="
                          background-image:
                          linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0px, rgba(0, 0, 0, 0) 50px),
                          linear-gradient(0deg, #fff 25px, rgba(0, 0, 0, 0) 100px)
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
                          <a href="<?php the_permalink();?>" class="noticia-sem-img camada-1">
                            <div class="noticia-sem-img-titulo"><?php the_title(); ?></div>
                          </a>
                        </div>

              <?php endif; }
            endwhile; else : endif; ?>
              </div> <!-- fecha noticias coluna -->
        </div> <!-- fecha div .conteudo -->


        <div class="link-wrapper justify-end">
          <a class="mais-link" href="<?php echo get_home_url(); ?>/noticias/">Mais Notícias</a>
        </div>
      </div> <!-- fecha div .noticias -->

      <!-- se quiser banners, codigo para o futuro:
        <div class="links-wrapper ">
          <div class="links">
            <a href="#" class="link-img camada-1"  style="
            background-image:
            linear-gradient(180deg, rgba(231, 120, 23, 0.7) 1000%, rgba(0, 0, 0, 0) 50%),
            url(#)">
              <div class="link-text" href="#">Calendário Acadêmico</div>
            </a>
            <a href="#" class="link-img camada-1"  style="
            background-image:
            linear-gradient(180deg, rgba(231, 120, 23, 0.7) 1000%, rgba(0, 0, 0, 0) 50%),
            url(#)">
              <div class="link-text" href="#">Demidias</div>
            </a>
            <a href="#" class="link-img camada-1"  style="
            background-image:
            linear-gradient(180deg, rgba(231, 120, 23, 0.7) 1000%, rgba(0, 0, 0, 0) 50%),
            url(#)">
              <div class="link-text" href="#">test psicotécnico </div>
            </a>
            <a href="#" class="link-img camada-1"  style="
            background-image:
            linear-gradient(180deg, rgba(231, 120, 23, 0.7) 1000%, rgba(0, 0, 0, 0) 50%),
            url(#)">
              <div class="link-text" href="#">Calendário Acadêmico</div>
            </a>
          </div>
        </div>
      -->



    <div class="curso">


<?php $widget_values = dynamic_sidebar('widgets-da-home'); ?>

</div>

<?php get_footer(); ?>
