<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estudo Site Coordenação</title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.cdnfonts.com/css/rawline" rel="stylesheet">

  <link href="assets/fontawesome6/css/fontawesome.css" rel="stylesheet">
  <link href="assets/fontawesome6/css/brands.css" rel="stylesheet">
  <link href="assets/fontawesome6/css/regular.css" rel="stylesheet">
  <link href="assets/fontawesome6/css/solid.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>

<div class="container">
  <!-- Lateral esquerda do site-->
  <div class="lateral">
    <div class="logo-bg">
    	<div class="logo">
    		<img  src="img/midias-logo.png" alt="logo DEMID">
    	</div>
    </div>
      <div class="sidebar-bg">
        <div class="sidebar">
          <ul>
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
          </ul>
        </div>
	    </div>
  </div>


	  <!-- Lateral direita do site-->
	  <header class="cabecalho">

	    <div class="titulo">

	      <div class="tit_img"><img id="tit_img" src="img/SVG final.svg" alt="Logo do curso de Comunicação em Mídias Digitais"></div>

	    	<div class="title">
	    		<p id="tit_centro"><?php printf( get_bloginfo ( 'description' ) ); ?><br /></p>
	        <h1 id="tit_curso"><?php echo get_bloginfo( 'name' ); ?></h1>
	    	</div>

	    	<div class="brasao">
	        <img  src="img/SVG final.svg" alt="logo ufpb">
	      </div>
	    </div>
	    <div class="nav-bar-bg">
	    	<div class="nav-bar">
	        <div class="topnav" id="myTopnav">
	            <nav>
	              <ul>
	                <li><a href="#">Notícias</a></li>
	                <li><a href="#">Curso</a></li>
	                <li><a href="#">Projetos</a></li>
	                <li><a href="#">Documentos</a></li>
	                <li><a href="#">Chamados</a></li>
	                <li>
	                  <div class="acc-container">

	                    <div class="acc-btn"><a>Docentes</a><i class="fa-solid fa-chevron-down"></i></div>
	                    <div class="acc-content">
	                      <a href="#">notícias</a>
	                      <a href="#">corpo adminstrativo</a>
	                    </div>

	                    <div class="acc-btn"><a>Discentes</a><i class="fa-solid fa-chevron-down"></i></div>
	                    <div class="acc-content">
	                      <a href="#">tcc</a>
	                      <a href="#">documentos</a>
	                      <a href="#">projetos</a>
	                      <a href="#">notícias</a>
	                      <a href="#">mapa</a>
	                    </div>

	                    <div class="acc-btn"><a>Visitantes</a><i class="fa-solid fa-chevron-down"></i></div>
	                    <div class="acc-content">
	                      <a href="#">apresentação</a>
	                      <a href="#">vídeos</a>
	                      <a href="#">mapa</a>
	                    </div>

	                    <div class="acc-btn"><a> Links</a><i class="fa-solid fa-chevron-down"></i></div>
	                    <div class="acc-content">
	                      <a href="#">sigaa</a>
	                      <a href="#">ufpb</a>
	                    </div>

	                  </div>
	                </li>
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
