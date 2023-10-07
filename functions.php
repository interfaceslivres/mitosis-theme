<?php

// Adicionar suporte p/ Thumbnails
add_theme_support( 'post-thumbnails' );


// Registrar os Menus do Tema
function register_menus() { 
    register_nav_menus(
        array(
            'main-menu' => 'Menu Principal',
            'sidebar-menu' => 'Menu Lateral',
            'footer-menu' => 'Menu do Footer',
            'test-menu' => 'Menu test',
        )
    ); 
}
add_action( 'init', 'register_menus' );



// Função da logo customizada
function themename_custom_logo_setup() {
	$defaults = array(

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
    // Registrar um widget personalizado
    register_sidebar(array(
        'name'          => 'Área de Widgets da Home',
        'id'            => 'widgets-da-home',
        'description'   => 'Esta é a descrição da minha área de widget personalizada.',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));

    // Registrar mais widgets personalizados, se necessário
}

// Hook para registrar os widgets personalizados
add_action('widgets_init', 'registrar_widgets_personalizados');














// Registrar o widget personalizado
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
                'description' => 'Um widget personalizado para cursos com campos de nome, vídeo, FAQ, localização, link destaque e imagem banner.'
            )
        );
    }

    // Função para exibir o widget no frontend
    public function widget($args, $instance) {
        echo $args['before_widget'];
        // Exibir o conteúdo do widget
        echo '<h2 class="secoes">' . esc_html($instance['nome-do-curso']) . '</h2>';
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
	        echo '<div class="text-ufpb"> <div class="text-ufpb-text"> <p>' . nl2br(esc_html($instance['texto-localizacao'])) . '</p></div>';
    	

	        // Links de Destaque
	        echo '<div class="text-ufpb-link">';
	        for ($i = 1; $i <= 2; $i++) {
	            $texto_link = $instance['texto-link-destaque' . $i];
	            $url_link = $instance['url-link-destaque' . $i];
	            if (!empty($texto_link) && !empty($url_link)) {
	                echo '<a class="mais-link" href="' . esc_url($url_link) . '">' . esc_html($texto_link) . '</a>';
	            }
	        }
	    }

        echo '</div> </div> </div> </div> </div></div> </div>  <!-- fecha todas as divs do conteiner -->';

        // Imagem Banner
        if (!empty($instance['imagem-banner'])) {
            echo '<div class="imagem-curso"> <img src="' . esc_url($instance['imagem-banner']) . '" alt="Adendo gráfico do site do curso"></div>';
        }

        echo $args['after_widget'];
    }

    // Função para exibir o formulário de configuração do widget no painel de controle
    public function form($instance) {
        // Campos do widget
        $campos = array(
            'nome-do-curso' => 'Nome do Curso',
            'video-do-curso' => 'Vídeo do Curso',
            'faq1' => 'Informação 1',
            'resposta1' => 'Resposta 1 (670 caracteres)',
            'faq2' => 'Informação 2',
            'resposta2' => 'Resposta 2 (670 caracteres)',
            'faq3' => 'Informação 3',
            'resposta3' => 'Resposta 3 (670 caracteres)',
            'localizacao' => 'Localização (cole apenas a URL do Google Maps)',
            'texto-localizacao' => 'Texto sobre Localização (670 caracteres)',
            'texto-link-destaque1' => 'Texto do Link Destaque 1',
            'url-link-destaque1' => 'URL do Link Destaque 1',
            'texto-link-destaque2' => 'Texto do Link Destaque 2',
            'url-link-destaque2' => 'URL do Link Destaque 2',
            'imagem-banner' => 'URL da Imagem Banner'
        );

		// Exibir campos do formulário
		$index = 0;
		foreach ($campos as $campo => $label) {
		    $valor = !empty($instance[$campo]) ? esc_attr($instance[$campo]) : '';
		    echo '<p>';
		    echo '<label for="' . $this->get_field_id($campo) . '">' . esc_html($label) . ':</label>';

		    // Verificar se o índice é par
		    if ($index < 3 || $index == 4 || $index == 6 || $index == 8 ||  $index >= 10) {
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









?>