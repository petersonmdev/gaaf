<!--footer-main-->
    <footer class="footer-main footer-gaaf">
      <div class= "footer-newsletter">
        <div class="container">
          <div class="row content-newsletter-gaaf">
            <div class="col-lg-4 col-md-6 content-title-newsletter">
              <h4>CADASTRE-SE</h4>
              <h5>E RECEBA NOSSA NOVIDADES</h5>
              <h3>E OFERTAS EXCLUSIVAS</h3>
            </div>
            <div class="col-lg-5 col-md-6">
              <div class="input-group">
                  <input class="form-control inpt-gaaf-second" type="email" name="newsletter" placeholder="Digite seu email aqui..." aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-gaaf-second" type="button" id="button-addon2">ME INSCREVER</button>
                  </div>
              </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block social-midia-gaaf">
              <h4>Nos siga também nas redes sociais</h4>
              <ul class="list-inline social-icons">
                <li><a href="https://www.facebook.com/GaafModaPraia2"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://www.instagram.com/gaafmodapraia"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-social-media">
        <div class="container">
          <div class="row content-newsletter-gaaf-bottom d-lg-none d-md-block">
            <div class="col-12 text-center">
              <h4 class="mb-2">Nos siga também nas redes sociais</h4>
              <ul class="list-inline social-icons">
                <li class="d-inline"><a href="https://www.facebook.com/GaafModaPraia2"><i class="fab fa-facebook-square"></i></a></li>
                <li class="d-inline"><a href="https://www.instagram.com/gaafmodapraia"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>      
        </div>    
      </div>
      
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h6 class="title-footer-top">Categorias</h6>
              <ul class="menu-link">
                <li>
                  <a href="product.php">Mais vendidos</a>
                </li>
                <li>
                  <a href="product.php">Produtos em destaque</a>
                </li>
                <li>
                  <a href="product.php">Biquinis</a>
                </li>
                <li>
                  <a href="product.php">Maiôs</a>
                </li>
                <li>
                  <a href="product.php">Sungas</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h6 class="title-footer-top">NOSSA EMPRESA</h6>
              <ul class="menu-link">
                <li>
                  <a href="<?php echo get_site_url(); ?>/sobre-nos">Sobre nós</a>
                </li>
                <li>
                  <a href="https://www2.correios.com.br/sistemas/rastreamento/default.cfm" target="_blank">Rastrear pedido</a>
                </li>
                <li>
                  <a href="<?php echo get_site_url(); ?>/politica-de-entrega">Política de entrega</a>
                </li>
                <li>
                  <a href="<?php echo get_site_url(); ?>/politicas-de-trocas-e-devolucoes">Política de trocas e devoluções</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h6 class="title-footer-top">MINHA CONTA</h6>
              <ul class="menu-link">
                <li>
                  <a href="<?php echo get_site_url(); ?>/minha-conta">Minha conta</a>
                </li>
                <li>
                  <a href="<?php echo get_site_url(); ?>/minha-conta/orders">Meus pedidos</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h6 class="title-footer-top">ATENDIMENTO</h6>
              <ul class="menu-link">
                <li>
                  <a href="common.php">Atendimento ao cliente</a>
                </li>
                <hr>
                <li>
                  <span>De segunda a Quinta, das 7h as 17h, sexta-feira, das 7h as 16h</span>
                </li>
                <li>
                  <a href="tel:+5562984426692">(62) 98442-6692</a>
                </li>
                <li>
                  <a href="tel:+5562984212752">(62) 98421-2752</a>
                </li>
                <li>
                  <a href="mail:sac@gaafmodapraia.com.br">sac@gaafmodapraia.com.br</a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 footer-gaaf-cards">
              <h6 class="title-footer-top">PAGUE COM</h6>
              <div class="d-md-block d-sm-none d-none">
                <img src="<?= img; ?>/icons/payment-method-desktop.png" alt="cartões aceitos">
              </div>
              <div class="d-md-none d-sm-block">
                <img src="<?= img; ?>/icons/payment-method-mobile.png" alt="cartões aceitos">
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h6 class="title-footer-top">SELOS DE SEGURANÇA</h6>
              <div class="col-12 footer-gaaf-icons-secure">
                <img class="d-inline ssl-google" src="<?= img; ?>/icons/site-seguro-google.png" alt="">
                <img class="d-inline logo-pagarme" src="<?= img; ?>/icons/logo_pagarme.png" alt="Logo Pagar.me">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container clearfix">
          <div class="copyright-text">
            <p><strong>GAAF MODA PRAIA - CNPJ: 12.039.724/0001-28</strong> &copy; Todos direitos reservados, <?php echo date("Y"); ?>
              <br>
              Avenida Adjunto Rodrigues Vaz, quadra J lote 11, setor estrela do Oriente, Trindade - GO
            </p>
          </div>
          <ul class="footer-bottom-link">
            <li>
              <span>Desenvolvido por:</span>
            </li>
            <li>
              <h3>PETERSON MACEDO</h3>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <!--End footer-main-->

  </div>
  <!--End pagewrapper-->

  <script src="<?= plugins; ?>/jquery.js"></script>
  <script src="<?= plugins; ?>/bootstrap.min.js"></script>
  <script src="<?= plugins; ?>/bootstrap-select.min.js"></script>
  <!-- Slick Slider -->
  <script src="<?= plugins; ?>/slick/slick.min.js"></script>
  <!-- FancyBox -->
  <script src="<?= plugins; ?>/fancybox/jquery.fancybox.min.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script src="<?= plugins; ?>/google-map/gmap.js"></script>

  <script src="<?= plugins; ?>/validate.js"></script>
  <script src="<?= plugins; ?>/wow.js"></script>
  <script src="<?= plugins; ?>/jquery-ui.js"></script>
  <script src="<?= plugins; ?>/timePicker.js"></script>
  <script src="<?= js; ?>/script.js"></script>

  <?php wp_footer(); ?>

</body>
</html>
