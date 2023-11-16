
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
      <div class="corpo" id="noticias">
            <div class="corpo-grid">
                <div class="content-grid">
                    <h1>Notícias</h1>
                    <div class="cards-lista">
              
                       
                            <?php
                                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                                $query = new WP_Query( array(
                                    'paged' => $paged
                                ) );
                            ?>

                            <?php if ( $query->have_posts() ) : ?>

                            <!-- begin loop -->
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                    
                                        
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
                                                        <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="background-image: linear-gradient(270deg, rgba(255, 255, 255, 0) 20%, #fff 25%), url(<?php the_post_thumbnail_url(); ?>); 
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
                                        echo paginate_links( array(
                                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                            'total'        => $query->max_num_pages,
                                            'current'      => max( 1, get_query_var( 'paged' ) ),
                                            'format'       => '?paged=%#%',
                                            'show_all'     => false,
                                            'type'         => 'plain',
                                            'end_size'     => 2,
                                            'mid_size'     => 1,
                                            'prev_next'    => true,
                                            'prev_text'    => sprintf( '<span>Anterior</span> %1$s', __( '', 'text-domain' ) ),
                                            'next_text'    => sprintf( '%1$s <span>Próxima</span>', __( '', 'text-domain' ) ),
                                            'add_args'     => false,
                                            'add_fragment' => '',
                                        ) );
                                    ?>
                                </div>






                          


                        </div>

                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
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
