
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
        <img id="footer-logo" src="<?php echo get_bloginfo("template_directory"); ?>/img/ufpb-brasao-pb.png">
        <div>
          <div><?php echo get_bloginfo( 'name' ); ?></div>
          <div class="redes-sociais">
            <a href="<?php bloginfo('atom_url'); ?>"><i class="fa-solid fa-square-rss"></i></a>
            <?php $widget_values = dynamic_sidebar('widgets-do-footer'); ?>
          </div>
        </div>

        <div class="footer-direita">
          <div id="footer-creditos">
            <!--<a href="https://github.com/interfaceslivres"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-interfaces2.png" alt="Logo do Projeto Interfaces Livres"></a>-->
            <a href="https://www.sti.ufpb.br/"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/sti-logo-branco.png" alt="Logo do STI"></a>
            <a href="https://ufpb.br/"><img class="img-creditos" src="<?php echo get_bloginfo("template_directory"); ?>/img/logo-ufpb-branca-footer.png" alt="Logo da UFPB"></a>
          </div>
        </div>
      </div>

      <div id="footer-linha"></div>

      <div id="footer-bottom">
        <div id="footer-ultima-linha">
          <div>© 2023 Universidade Federal da Paraíba.</div>
          <div>
            <a href="https://www.ufpb.br/ouvidoria">Ouvidoria</a>
            <a href="https://www.ufpb.br/acessoainformacao/">Acesso à Informação</a>
            <a href="https://www.ufpb.br/cia/">Acessibilidade</a>
            <a href="https://dados.gov.br/home">Dados Abertos UFPB</a>
            <a href="https://www.gov.br/mds/pt-br/pt-br/acesso-a-informacao/privacidade-e-protecao-de-dados">Privacidade e Proteção de Dados</a>
          </div>

        </div>
      </div>


  </div>
  </footer>
</div> <!-- fecha footer wrapper -->

</div> <!-- fecha div .container aberta no header.php -->

<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/controller.js"> </script>
<?php wp_footer() ?>
</body>
</html>
