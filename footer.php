
<?php
// Obtém a URL da imagem do Customizer
$imagem_footer_url = get_theme_mod('imagem_footer');

if (!empty($imagem_footer_url)) {
    echo '<div class="imagem-curso"> <img src="' . esc_url($imagem_footer_url) . '" alt="Adendo gráfico do site"></div>';
}
?>

<div id="footer-wrapper">
  <footer>
    


    <div id="footer-top">
      <div id="footer-dados">
        <img id="footer-logo" src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-ufpb-svg.svg">
        <div>
          <div><?php echo get_bloginfo( 'name' ); ?></div>
          <div class="redes-sociais">
            <a href="<?php bloginfo('atom_url'); ?>"><i class="fa-solid fa-square-rss"></i></a>


            <?php $widget_values = dynamic_sidebar('widgets-do-footer'); ?>



      <div class="footer-direita">
        <div id="footer-creditos">
          <a href="https://github.com/interfaceslivres"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-interfaces2.png" alt=""></a>
          <a href="https://www.sti.ufpb.br/"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/sti-logo-branco.png" alt=""></a>
          <a href="https://ufpb.br/"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-escura-ufpb.png" alt=""></a>
        </div>
      </div>
    </div>
    <div id="footer-linha"></div>
    <div id="footer-bottom">
      <div id="footer-ultima-linha">
        <div>© 2023 Universidade Federal da Paraíba.</div>
        <div>
          <a href="#">Acesso à Informação</a>
          <a href="#">Acessibilidade</a>
          <a href="#">Dados Abertos UFPB</a>
          <a href="#">Privacidade e Proteção de Dados</a>
        </div>

      </div>
    </div>
  </footer>
</div>
</div> <!-- fecha div .container aberta no header.php -->

<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/controller.js"> </script>
<?php wp_footer() ?>
</body>
</html>
