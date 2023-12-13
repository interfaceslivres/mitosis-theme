
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
      <div class="corpo" id="noticias">
            <div class="corpo-grid">
                <div class="content-grid">
                    <h1>Notícias</h1>
                    <div class="cards-lista">


                            <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Página atual

   $args = array(
            'post_type' => 'post',
            'paged' => $paged,
    );

    $post_query = new WP_Query($args);
                            if ($post_query->have_posts() ) : ?>
                            <!-- begin loop -->
                            <?php while ($post_query->have_posts() ) : $post_query->the_post(); ?>
  
                                                    <?php if ( has_post_thumbnail()) : ?>
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
                                                        <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="background-image: linear-gradient(270deg, rgba(255, 255, 255, 0) 30%, #fff 50%), url(<?php the_post_thumbnail_url(); ?>); 
                                                        ">
                                                            <div class="background-wrapper3">                  
                                                            <div class="noticia-com-img-titulo"><?php the_title(); ?></div>
                                                            </div>                          
                                                        </a>
                                                        </div>
                                                    <?php else : ?> 
                                                        <div class="noticia-wrapper4">
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
                                                        <a class="noticia-sem-img2 camada-1" href="<?php the_permalink();?>"> 
                                                            <div class="noticia-sem-img-titulo" ><?php the_title(); ?></div>
                                                        </a>
                                                        </div>

                                                        
                                                        <?php endif; ?>

                                        

                                    <?php endwhile; ?>
                            <!-- end loop -->


                            


                            <div class="paginas-nav">

                                <div class="pagination">
                                    <?php 
                                       // Adiciona a paginação
                                    echo paginate_links(array(
                                        'total' => $post_query->max_num_pages,
                                        'current' => max(1, $paged),
                                        'prev_text' => __('Anterior'),
                                        'next_text' => __('Próximo'),
                                    ));
                                    ?>
                                </div>



                        </div>

                            <?php else : ?>
                                <p><?php _e( 'Desculpe, nenhum post corresponde aos seus critérios.' ); ?></p>
                            <?php endif; ?>

                    </div>


                        </div>
                    </div>                    
                </div>
            </div>          
        </div>
    </div>
    </div>
</div>

<?php get_footer(); ?>
