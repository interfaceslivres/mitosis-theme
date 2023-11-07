
<?php get_header(); ?>

  <div class="main">
    
      <div class="noticias">
      <div class="corpo" id="noticias">
            <div class="corpo-grid">
                <div class="content-grid">
                    <h1>Notícias</h1>
                    <div class="cards-lista">
              
                       

                            


                            <!--
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

                            -->



                            <?php
                                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                                $query = new WP_Query( array(
                                    'paged' => $paged
                                ) );
                            ?>

                            <?php if ( $query->have_posts() ) : ?>

                            <!-- begin loop -->
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

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
                                                        <a class="noticia-sem-img camada-1" href="<?php the_permalink();?>"> 
                                                            <div class="noticia-sem-img-titulo" id="noticia-principal"><?php the_title(); ?></div>
                                                        </a>
                                                        </div>

                                                        
                                                        <?php endif; ?>

                                            </div>

                                    <?php endwhile; ?>
                            <!-- end loop -->


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
                                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                                        'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                                        'add_args'     => false,
                                        'add_fragment' => '',
                                    ) );
                                ?>
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
