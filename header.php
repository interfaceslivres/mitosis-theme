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
	<link href="https://fonts.cdnfonts.com/css/rawline" rel="stylesheet">

	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/brands.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/regular.min.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/solid.min.css" rel="stylesheet">


	<?php wp_head(); ?>

</head>

<body>
<script>
    // Verifica se a classe está no localStorage
     var memoContraste = localStorage.getItem('xContraste');
     var memoAutismo = localStorage.getItem('xAutismo');
     var body = document.getElementsByTagName("body")[0];
    // Se a classe estiver presente, adiciona a classe "constraste"
     if (memoContraste == 1) {
      body.classList.add('contraste'); 
     }
    // Se a classe estiver presente, adiciona a classe "autismo"
     if (memoAutismo == 1) {
      body.classList.add('autismo'); 
     } 
</script>

<div class="container">
  <!-- Lateral esquerda do site-->
  <div class="lateral">
    <div class="logo-bg">
    	<div class="logo">
    		<a href="<?php echo get_home_url(); ?>">
	    	<?php the_custom_logo(); ?>
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

	      

	    	<div class="title">
	    		<a href="<?php $custom_urlcentro = esc_url(get_theme_mod('custom_urlcentro', 'https://www.ufpb.br'));
echo esc_url($custom_urlcentro) ?>" id="tit_centro"><?php
$custom_centro = get_theme_mod('custom_centro', 'Reitoria'); echo esc_html($custom_centro);?></a><br />
	        <h1 id="tit_curso"><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
	    	</div>

	    	<div class="brasao">
	        <a href="https://ufpb.br/"><img  src="<?php echo get_bloginfo("template_directory"); ?>/img/ufpbbrasao6.png" alt="logo ufpb"></a>
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

	      <div class="acessibilidade"  id="acess-bloco">  
	        <a href="javascript:void(0);" class="iconAcessibilidade" onclick="menuAcess();"><i title="Menu de Acessibilidade" id="icone-acess" class="fa-solid fa-universal-access"></i></a>
		      <a href="javascript:void(0);" class="iconAcessibilidade altoconstraste" onclick="altoContraste();"><i title="Alto Constraste" class="fa-solid fa-eye"></i></a>
		      <a href="javascript:void(0);" class="iconAcessibilidade autismo" onclick="autismo();"><i title="Autismo" class="fa-solid fa-ribbon"></i></a>
	      </div>

	      <div class="lupa">
	        <a href="javascript:void(0);" class="iconPesquisa"  onclick="menuTransformaPesquisa()" ><i id="lupaParaFechar" class="fa-solid fa-magnifying-glass"></i></a>
	      </div>

	      <div id="myPesquisa" class="pesquisa" >
	        <div class="barraBotaop">
	          <div class="barra">
			  <?php get_search_form(); ?>
	           <!-- <input type="text" placeholder="Digite sua pesquisa..." id="barraConfig"> -->
	          </div>


	          <!-- <div class="botaop">
	            <p>Pesquisar</p>
	            <i id="xBarra" class="fa-solid fa-magnifying-glass"></i>
	          </div>
				-->
				
	        </div>
	      </div>

	    	</div>
	    </div>
	  </header>
