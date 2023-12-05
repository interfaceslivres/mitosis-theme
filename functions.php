<?php

// Adicionar suporte p/ Thumbnails
add_theme_support( 'post-thumbnails' );


// Registrar os Menus do Tema
function register_menus() { 
    register_nav_menus(
        array(
            'main-menu' => 'Menu Principal',
            'sidebar-menu' => 'Menu Lateral',
            'localizacao-menu' => 'Links em Localização',
        )
    ); 
}
add_action( 'init', 'register_menus' );

// adicionar opcao de classes pros menus
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


// Função da logo customizada
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 150,
        'width'                => 150,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );





// Registrar widgets
function registrar_widgets_personalizados() {
    // Registrar area de widget personalizado
    register_sidebar(array(
        'name'          => 'Área de Widgets da Home',
        'id'            => 'widgets-da-home',
        'description'   => 'Insira os itens correspondentes para ter a visualização na página inicial, o site nunca poderá estar sem a presença da localização, use o link da URL do Google Maps e não o link gerado pelo botão compartilhar, pois esse link não tem os dados de latitude e longitude como o sistema espera.',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));

    register_sidebar(array(
        'name'          => 'Área de Widgets do Footer',
        'id'            => 'widgets-do-footer',
        'description'   => 'Defina o conteúdo que estará no Footer do site. A imagem é alterada na área de personalização.',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));

    // Registrar mais areas de widgets personalizados, se necessário
}

// Hook para registrar os widgets
add_action('widgets_init', 'registrar_widgets_personalizados');




// adicionar cores personalizadas
//Inicio das cores personalizadas
function meu_tema_personalizado($wp_customize) {

  // Adicionando a seção de cores personalizadas
  $wp_customize->add_section('cores_personalizadas', array(
    'title' => __('Cores Personalizadas', 'meu-tema'),
    'description' => __('Personalize as cores do seu tema', 'meu-tema'),
    'priority' => 30
  ));

  // Adicionando a opção de cor padrão do tema
  $wp_customize->add_setting('cor_padrao', array(
    'default' => '#102d69',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_padrao', array(
    'label' => __('Cor Padrão do Tema', 'meu-tema'),
    'section' => 'cores_personalizadas',
    'settings' => 'cor_padrao'
  )));

}
add_action('customize_register', 'meu_tema_personalizado');
//Fim das cores personalizadas










// Registrar o widget personalizado p/ home
function registrar_widget_curso() {
    register_widget('Widget_Curso');
}
add_action('widgets_init', 'registrar_widget_curso');

// Criar a classe do widget personalizado
class Widget_Curso extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'widget_curso',
            'Widget de Curso',
            array(
                'description' => 'Um widget personalizado para cursos com campos de nome, vídeo, FAQ e localização.'
            )
        );
    }

    // Função para exibir o widget no frontend
    public function widget($args, $instance) {
        echo $args['before_widget'];
        // Exibir o conteúdo do widget
        if (!empty($instance['nome-do-curso'])) {
        echo '<h2 class="secoes">' . esc_html($instance['nome-do-curso']) . '</h2>';
        }
        
        if (!empty($instance['video-do-curso'])) {
	        $url = esc_url($instance['video-do-curso']);
	        // Substitua "watch" por "embed" na URL
	        $embed_url = str_replace("watch?v=", "embed/", $url);
	        echo '<div class="youtube"><iframe width="100%" height="100%" src="' . $embed_url . '" title="Video Player" frameborder="0" allow="web-share" allowfullscreen></iframe></div>';
    	}
        // FAQ
        echo '<div class="text-curso">';
        for ($i = 1; $i <= 3; $i++) {
            $faq = $instance['faq' . $i];
            $resposta = $instance['resposta' . $i];
            if (!empty($faq) && !empty($resposta)) {
                echo '<h3>' . esc_html($faq) . '</h3><p>' . nl2br(esc_html($resposta)) . '</p>';
            }
        }
        echo '</div> <!-- fecha div text-curso --> </div> <!-- fecha div curso -->';

        // Localização
        if (!empty($instance['localizacao'])) {


				// URL do Google Maps
				$google_maps_url = esc_html($instance['localizacao']);
				if (preg_match('/@([-0-9.]+),([-0-9.]+)/', $google_maps_url, $matches)) {
				    $latitude = $matches[1];
				    $longitude = $matches[2];
				    
				    // Crie o código de incorporação do Google Maps
				    $iframe_code = '<iframe src="https://maps.google.com/maps?q='.$latitude.','.$longitude.'&t=k&hl=pt-BR&z=20&amp;output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
				}



	        echo '<div class="mais"> <div class="mapa"> <div class="mapa-titulo">';
	        echo '<h2>Localização:</h2></div>';
	        echo '<div class="mapa-img">' . $iframe_code . '</div></div>';
	        echo '<div class="text-ufpb"> <div class="text-ufpb-text"> <p>' . nl2br(esc_html($instance['texto-localizacao'])) . '</p></div><div class="text-ufpb-link">';
    	

            wp_nav_menu(   
                array ( 
                    'theme_location' => 'localizacao-menu',
                    'items_wrap' => '%3$s',
                    'container' => false,
                    'link_class'   => 'mais-link'
                ) 
            ); 

	    }

        echo '</div> </div> </div> </div> </div></div> </div>  <!-- fecha todas as divs do conteiner -->';

        // Imagem Banner
  //      if (!empty($instance['imagem-banner'])) {
   //         echo '<div class="imagem-curso"> <img src="' . esc_url($instance['imagem-banner']) . '" alt="Adendo gráfico do site do curso"></div>';
  //      }

        echo $args['after_widget'];
    }

    // Função para exibir o formulário de configuração do widget no painel de controle
    public function form($instance) {
        // Campos do widget
        $campos = array(
            'nome-do-curso' => 'Título da Seção',
            'video-do-curso' => 'Vídeo da Seção',
            'faq1' => 'Título da Informação 1',
            'resposta1' => 'Texto da Informação 1 (670 caracteres)',
            'faq2' => 'Título da Informação 2',
            'resposta2' => 'Texto da Informação 2 (670 caracteres)',
            'faq3' => 'Título da Informação 3',
            'resposta3' => 'Texto da Informação 3 (670 caracteres)',
            'localizacao' => 'Localização (cole apenas a URL do Google Maps)',
            'texto-localizacao' => 'Texto sobre Localização (670 caracteres)'
        );

		// Exibir campos do formulário
		$index = 0;
		foreach ($campos as $campo => $label) {
		    $valor = !empty($instance[$campo]) ? esc_attr($instance[$campo]) : '';
		    echo '<p>';
		    echo '<label for="' . $this->get_field_id($campo) . '">' . esc_html($label) . ':</label>';

		    // Verificar se o índice é par
		    if ($index < 3 || $index == 4 || $index == 6 || $index == 8) {
		        echo '<input class="widefat" id="' . $this->get_field_id($campo) . '" name="' . $this->get_field_name($campo) . '" type="text" value="' . $valor . '">';
		    } else {
		        echo '<textarea class="widefat"  maxlength="677" id="' . $this->get_field_id($campo) . '" name="' . $this->get_field_name($campo) . '" rows="5">' . $valor . '</textarea>';
		    }

		    echo '</p>';
		    $index++;
		}
    }

    // Função para atualizar os valores do widget no painel de controle
    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach ($new_instance as $campo => $valor) {
            $instance[$campo] = (!empty($valor)) ? strip_tags($valor) : '';
        }
        return $instance;
    }
}

// fim do registro de widget personalizado da home




// imagem customizada entre conteudo e footer
function adicionar_controle_imagem_footer($wp_customize) {
    $wp_customize->add_section('secao_imagem_footer', array(
        'title' => 'Imagem do Footer',
        'priority' => 30,
    ));

    $wp_customize->add_setting('imagem_footer', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'imagem_footer', array(
        'label' => 'Escolha a imagem do footer: 1900 x 300. (Use https://tinypng.com/ para otimizar o carregamento.)',
        'section' => 'secao_imagem_footer',
        'settings' => 'imagem_footer',
    )));
}
add_action('customize_register', 'adicionar_controle_imagem_footer');





//noticias relacionadas ou outras noticias

function cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '2',
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()): ?>

        <h2>Outras Notícias</h2>
        <div class="noticias-relacionadas">

        <?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <?php if ( has_post_thumbnail() ) { ?>
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
                            </div> <!-- fecha categorias -->
                          </div> <!-- fecha div rotulo-claro -->
                          <a href="<?php the_permalink();?>" class="noticia-com-img camada-1" style="
                          background-image:
                          linear-gradient(180deg, rgba(0,   0,   0, 0.5) 0%, rgba(0, 0, 0, 0) 50%), 
                          linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #ffffff 85%),
                          url(<?php the_post_thumbnail_url(); ?>)">
                            <div class="background-wrapper">                  
                              <div class="noticia-com-img-titulo"><?php the_title(); ?></div>
                            </div>                          
                          </a>
                    </div>
            <?php } else { ?> 

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
                              </div> <!-- fecha a div categorias -->
                            </div> <!-- fecha a div rotulo -->
                            <a href="<?php the_permalink();?>" class="noticia-sem-img camada-1">              
                            <div class="noticia-sem-img-titulo"><?php the_title(); ?></div>    
                            </a>
                    </div>


        <?php 
         } 
        endwhile;

        // Restore original Post Data
        wp_reset_postdata();
        ?> 
        </div> <!-- fecha div noticias-relacionadas -->
        <?php
     endif;

}





















// WIDGETS PERSONALIZADOS DO FOOTER

class WidgetRedesSociais extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'widget_footer_top',
            'Widget Footer',
            array(
                'description' => 'Widget com os itens padronizados do footer.'
            )
        );
    }

    public function widget($args, $instance) {
        // Extrair os valores dos campos do widget
        $twitter = !empty($instance['twitter']) ? esc_url($instance['twitter']) : '';
        $instagram = !empty($instance['instagram']) ? esc_url($instance['instagram']) : '';
        $facebook = !empty($instance['facebook']) ? esc_url($instance['facebook']) : '';
        $youtube = !empty($instance['youtube']) ? esc_url($instance['youtube']) : '';
        $endereco = !empty($instance['endereco']) ? esc_textarea($instance['endereco']) : '';
        $telefone = !empty($instance['telefone']) ? esc_html($instance['telefone']) : '';
        $contato = !empty($instance['contato']) ? esc_url($instance['contato']) : '';
        $horario_funcionamento = !empty($instance['horario_funcionamento']) ? esc_html($instance['horario_funcionamento']) : '';

        // Exibir o conteúdo do widget
        echo $args['before_widget'];
        if (!empty($instagram)) {
            echo '<a href="' . esc_url($instagram) . '"><i class="fa-brands fa-square-instagram"></i></a>';
        }
        if (!empty($twitter)) {
            echo '<a href="' . esc_url($twitter) . '"><i class="fa-brands fa-square-twitter"></i></a>';
        }
        if (!empty($facebook)) {
            echo '<a href="' . esc_url($facebook) . '"><i class="fa-brands fa-square-facebook"></i></a>';
        }
        if (!empty($youtube)) {
            echo '<a href="' . esc_url($youtube) . '"><i class="fa-brands fa-square-youtube"></i></a>';
        }
        echo '</div>';
        if (!empty($endereco)) {
            echo '<address>' . wp_kses_post($endereco) . '</address>';
        }
        if (!empty($telefone)) {
            echo '<div class="f-link tel"><a href="' . esc_html($telefone) . '">' . esc_html($telefone) . '</a></div>';
        }
        if (!empty($contato)) {
            echo '<div class="f-link"><a class="mais-link" href="' . esc_url($contato) . '">Contato</a></div>';
        }
        if (!empty($horario_funcionamento)) {
            echo '<div>' . esc_html($horario_funcionamento) . '</div>';
        }
        echo $args['after_widget'];
    }

    public function form($instance) {
        // Exibir o formulário de configuração do widget
        $twitter = !empty($instance['twitter']) ? esc_attr($instance['twitter']) : '';
        $instagram = !empty($instance['instagram']) ? esc_attr($instance['instagram']) : '';
        $facebook = !empty($instance['facebook']) ? esc_attr($instance['facebook']) : '';
        $youtube = !empty($instance['youtube']) ? esc_attr($instance['youtube']) : '';
        $endereco = !empty($instance['endereco']) ? esc_textarea($instance['endereco']) : '';
        $telefone = !empty($instance['telefone']) ? esc_attr($instance['telefone']) : '';
        $contato = !empty($instance['contato']) ? esc_attr($instance['contato']) : '';
        $horario_funcionamento = !empty($instance['horario_funcionamento']) ? esc_attr($instance['horario_funcionamento']) : '';

        // Formulário de configuração do widget
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>">Link do Twitter:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="url" value="<?php echo $twitter; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">Link do Instagram:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="url" value="<?php echo $instagram; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">Link do Facebook:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="url" value="<?php echo $facebook; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>">Link do YouTube:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="url" value="<?php echo $youtube; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('endereco'); ?>">Endereço:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('endereco'); ?>" name="<?php echo $this->get_field_name('endereco'); ?>" rows="5"><?php echo $endereco; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('telefone'); ?>">Telefone:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('telefone'); ?>" name="<?php echo $this->get_field_name('telefone'); ?>" type="text" value="<?php echo $telefone; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contato'); ?>">Link de Contato:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('contato'); ?>" name="<?php echo $this->get_field_name('contato'); ?>" type="url" value="<?php echo $contato; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('horario_funcionamento'); ?>">Horário de Funcionamento:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('horario_funcionamento'); ?>" name="<?php echo $this->get_field_name('horario_funcionamento'); ?>" type="text" value="<?php echo $horario_funcionamento; ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        // Atualizar os valores do widget
        $instance = $old_instance;
        $instance['twitter'] = !empty($new_instance['twitter']) ? esc_url($new_instance['twitter']) : '';
        $instance['instagram'] = !empty($new_instance['instagram']) ? esc_url($new_instance['instagram']) : '';
        $instance['facebook'] = !empty($new_instance['facebook']) ? esc_url($new_instance['facebook']) : '';
        $instance['youtube'] = !empty($new_instance['youtube']) ? esc_url($new_instance['youtube']) : '';
        $instance['endereco'] = !empty($new_instance['endereco']) ? esc_textarea($new_instance['endereco']) : '';
        $instance['telefone'] = !empty($new_instance['telefone']) ? esc_html($new_instance['telefone']) : '';
        $instance['contato'] = !empty($new_instance['contato']) ? esc_url($new_instance['contato']) : '';
        $instance['horario_funcionamento'] = !empty($new_instance['horario_funcionamento']) ? esc_html($new_instance['horario_funcionamento']) : '';

        return $instance;
    }
}

function registrar_widget_footer_top() {
    register_widget('WidgetRedesSociais');
}
add_action('widgets_init', 'registrar_widget_footer_top');
// FIM DO WIDGETS PERSONALIZADOS DO FOOTER






function custom_nav_menu_items($items, $args) {
    if ($args->theme_location == 'sidebar-menu') {
        // Transforma os itens em um array
        $menu_items = wp_get_nav_menu_items($args->menu);
        
        // Itera pelos itens para adicionar setas e classes
        foreach ($menu_items as $menu_item) {
            $has_children = in_array('menu-item-has-children', $menu_item->classes);
        }

    return $items;
}};






?>