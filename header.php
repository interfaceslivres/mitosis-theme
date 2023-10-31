<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_bloginfo( 'name' ); ?> - UFPB</title>



	<style>
	:root {
		--cor-tema: <?php echo get_theme_mod('cor_padrao', '#102d69'); ?>;
  	--cor-highlight: <?php echo get_theme_mod('cor_padrao', '#102d69'); ?>;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/script.js" ></script>
	
 	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link href="https://fonts.cdnfonts.com/css/rawline" rel="stylesheet">

	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/brands.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/regular.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/solid.min.css" rel="stylesheet">


	<?php wp_head(); ?>

</head>

<body>

<div class="container">
  <!-- Lateral esquerda do site-->
  <div class="lateral">
    <div class="logo-bg">
    	<div class="logo">
    		<a href="<?php echo get_home_url(); ?>">
	    		<?php
	    		$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					} else {
						echo '<img src="' . get_bloginfo('template_directory') . '/img/logo-ufpb.png" alt="' . get_bloginfo( 'name' ) . '">';
					}
					?>
				</a>
    	</div>
    </div>
      <div class="sidebar-bg">
        <div class="sidebar">
          <!--<ul>
            <li class="sidebar-titulo">Docentes</li>
            <li><a href="#">notícias</a></li>
            <li><a href="#">corpo adminstrativo</a></li>
            <li class="sidebar-titulo">Discentes</li>
            <li><a href="#">tcc</a></li>
            <li><a href="#">documentos</a></li>
            <li><a href="#">projetos</a></li>
            <li><a href="#">notícias</a></li>
            <li><a href="#">mapa</a></li>
            <li class="sidebar-titulo">Visitantes</li>
            <li><a href="#">apresentação</a></li>
            <li><a href="#">vídeos</a></li>
            <li><a href="#">mapa</a></li>
            <li class="sidebar-titulo">Links</li>
            <li><a href="#">sigaa</a></li>
            <li><a href="#">ufpb</a></li>
          </ul>-->

		  <?php 
			wp_nav_menu(   
				array ( 
					'theme_location' => 'sidebar-menu',
					'items_wrap' => '%3$s',
					'container' => false,
				) 
			); 
		?>
        </div>
	    </div>
  </div>


	  <!-- Lateral direita do site-->
	  <header class="cabecalho">

	    <div class="titulo">

	      <div class="tit_img"  id="tit_img"><?php the_custom_logo(); ?></div>

	    	<div class="title">
	    		<p id="tit_centro"><?php printf( get_bloginfo ( 'description' ) ); ?><br /></p>
	        <h1 id="tit_curso"><?php echo get_bloginfo( 'name' ); ?></h1>
	    	</div>

	    	<div class="brasao">
	        <img  src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-ufpb-cores.svg" alt="logo ufpb">
	      </div>
	    </div>
	    <div class="nav-bar-bg">
	    	<div class="nav-bar">
	        <div class="topnav" id="myTopnav">
	        <nav id="nav">
	            <ul>
					<?php 
						wp_nav_menu(   
							array ( 
								'theme_location' => 'main-menu',
								'items_wrap' => '%3$s',
								'container' => false,
							) 
						); 
					?>
				</ul>

				<ul class="acc-container">
					<?php 
						wp_nav_menu(   
							array ( 
								'theme_location' => 'sidebar-menu',
								'items_wrap' => '%3$s',
								'container' => false,
							) 
						); 
					?>
	              </ul>
	            </nav>

	            <a href="javascript:void(0);" class="icon" onclick="menuTransforma()"><i id="menuParaFechar" class="fa-solid fa-bars"></i><p class="menuAbrir" id="menuMenu">Menu</p><p class="menuFechar" id="menuFecharId">Fechar</p></a>
	      </div>

	      <div class="acessibilidade">
	        <a href="javascript:void(0);" class="iconAcessibilidade" onclick="test()" ><i id="acessibilidadeParaFechar" class="fa-solid fa-universal-access"></i></a>
	      </div>

	      <div class="lupa">
	        <a href="javascript:void(0);" class="iconPesquisa"  onclick="menuTransformaPesquisa()" ><i id="lupaParaFechar" class="fa-solid fa-magnifying-glass"></i></a>
	      </div>

	      <div id="myPesquisa" class="pesquisa" >
	        <div class="barraBotaop">
	          <div class="barra">
	            <input type="text" placeholder="Digite sua pesquisa..." id="barraConfig">
	          </div>
	          <div class="botaop">
	            <p>Pesquisar</p>
	            <i id="xBarra" class="fa-solid fa-magnifying-glass"></i>
	          </div>
	        </div>
	      </div>

	    	</div>
	    </div>
	  </header>
