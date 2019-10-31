<?php get_header(); ?>

    <!--=================================
    =            Page Slider            =
    ==================================-->
    <div class="hero-slider slider-gaaf">
        <!-- Slider Item -->
        <div class="slider-item slide1" style="<?php if ( $isMobile ) { echo "background-image:url(". img ."/slider/banner-mobile1.jpg)"; } else { echo "background-image:url(". img ."/slider/banner1.jpg)"; } ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Item -->
        <div class="slider-item" style="<?php if ( $isMobile ) { echo "background-image:url(". img ."/slider/banner-mobile2.jpg)"; } else { echo "background-image:url(". img ."/slider/banner2.jpg)"; } ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====  End of Page Slider  ====-->

    <section class="cta cta-gaaf d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cta-block">
                        <div class="emmergency item">
                            <i class="flaticon-pay"></i>
                            <div class="content-text-before-slide">
                              <span>Parcelamos em</span>
                              <h4><strong>ATÉ 3X SEM JURUS</strong></h4>
                            </div>
                        </div>
                        <div class="top-doctor item">
                            <i class="flaticon-logistics-delivery-truck-in-movement"></i>
                            <div class="content-text-before-slide">
                              <span>Entregamos para</span>
                              <h4><strong>TODO BRASIL</strong></h4>
                            </div>
                        </div>
                        <div class="working-time item">
                            <i class="flaticon-dollar-coin-stack"></i>
                            <div class="content-text-before-slide">
                              <h4><strong>5% DE DESCONTO</strong></h4>
                              <span>nas compras à vista</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Ofertas por preço -->
    <!-- <section class="section-filter-price section section-gaaf">
        <div class="outer-box clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                      <div class="section-title text-center pb-4">
                        <h3>OFERTAS POR ATÉ</h3>
                      </div>
                        <div class="buttons-filter-price container">
                          <div class="row">
                            <button type="button" data-filter="39.99" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">R$39,99</button>
                            <button type="button" data-filter="49.99" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">R$49,99</button>
                            <button type="button" data-filter="59.99" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">R$59,99</button>
                            <button type="button" data-filter="69.99" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">R$69,99</button>
                            <button type="button" data-filter="99.99" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">R$99,99</button>
                            <button type="button" data-filter="all" class="btn-filter btn btn-lg btn-gaaf-second col ml-2 mr-2 mb-3">Ver tudo</button>
                            <form id="form-price-filter" action="/loja" method="post">
                                <input type="hidden" id="input-price-filter" name="price-filter" value="">
                                <input type="hidden" name="has-filter" value="true">
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--End about us area-->

    <!--team section-->
    <section class="section-category team-section section section-gaaf">
        <div class="container">
            <div class="row">
              <?php
              $order = 'asc';
              $hide_empty = true ;
              $cat_args = array(
                  'order'      => $order,
                  'hide_empty' => $hide_empty
              );
 
              $product_categories = get_terms( 'product_cat', $cat_args);
               
              if( !empty($product_categories) ){
                  $i = 0;
                  foreach ($product_categories as $key => $category) { ?>
                    <div class="<?php if ($i == 2) {echo 'col-md-4 d-none d-md-flex';} else { echo 'col-md-4 col-sm-6';} ?>">
                      <div class="team-member">
                        <?php 
                        $cat_thumb_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true);
                        $cat_thumb_url = wp_get_attachment_url( $cat_thumb_id );
                        $term_link = get_term_link( $category, 'category' ); ?>
                        <img src="<?php echo $cat_thumb_url; ?>" alt="categoria" class="img-responsive">
                        <div class="contents text-center">
                          <h4><?php echo $category->name; ?></h4>
                          <form id="form-price-filter" action="/loja" method="post">
                              <input type="hidden" name="cat-filter" value="<?php echo $category->name; ?>">
                              <input type="hidden" name="has-filter" value="true">
                              <button type="submit" class="btn btn-lg btn-gaaf-second">Ver todos</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php
                    if (++$i == 3) break;
                  }
              } ?>
            </div>
        </div>
    </section>
    <!--End team section-->

    <section class="section-products-featured section section-gaaf">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="section-title text-center mb-3">
              <h3>Destaque</h3>
            </div>
          </div>
          <div class="d-none d-lg-flex">
          <?php

            $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand');
            $wc_query = new WP_Query($params);
          ?>
              <?php if ($wc_query->have_posts()) : ?>
              <?php while ($wc_query->have_posts()) :
              $wc_query->the_post();
              $product = wc_get_product(get_the_ID()); ?>
                <div class="col-2">
                    <div class="inner-box">
                        <div class="img_holder">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="images" class="img-responsive img-product">
                            </a>
                        </div>
                        <div class="image-content text-center">
                            <a href="<?php the_permalink(); ?>">
                                <span class="product-name"><?php the_title() ?></span>
                                <?php $woo_prices = woocommerce_prices($product);
                                if ($woo_prices['type'] == 'variable' ) {
                                    if($woo_prices['on_sale']){ ?>
                                        <h6 class="last-price">De: R$<?= $woo_prices['regular_price'] ?></h6>
                                        <h5 class="price">Por R$<?= $woo_prices['sale_price'] ?></h5>
                                        <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                    <?php }else{ ?>
                                        <h5 class="price">Por R$<?= $woo_prices['regular_price'] ?></h5>
                                        <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                    <?php } ?>
                                    <?php
                                } else { ?>
                                    <?php if($woo_prices['on_sale']){ ?>
                                        <h6 class="last-price">De: R$ <s><?= $woo_prices['regular_price'] ?></s></h6>
                                        <h5 class="price">Por R$<?= $woo_prices['sale_price'] ?></h5>
                                        <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                    <?php }else{ ?>
                                        <h5 class="price">Por R$<?= $woo_prices['regular_price'] ?></h5>
                                        <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                    <?php } ?>
                                <?php } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-gaaf-second">Comprar</a>
                        </div>
                    </div>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>
          </div>
          <div class="d-md-block d-lg-none carousel-mobile-gaaf">
            <div id="destaques" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#destaques" data-slide-to="0" class="active"></li>
                <li data-target="#destaques" data-slide-to="1"></li>
                <li data-target="#destaques" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner row w-100 mx-auto">
                  <?php
                      $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand');
                      $wc_query = new WP_Query($params);
                      if ($wc_query->have_posts()) :
                      while ($wc_query->have_posts()) :
                      $wc_query->the_post();
                      $product = wc_get_product(get_the_ID());
                  ?>

                  <div class="carousel-item col-12 active">
                      <div class="row">
                          <div class="col-6">
                              <div class="inner-box">
                                  <div class="img_holder">
                                      <a href="#">
                                          <img src="<?= img; ?>/gallery/1.jpg" alt="images" class="img-responsive img-product">
                                      </a>
                                  </div>
                                  <div class="image-content text-center">
                                      <a href="#">
                                          <span class="product-name">Nome do produto</span>
                                          <h6 class="last-price">De: R$59,99</h6>
                                          <h5 class="price">Por R$39,99</h5>
                                          <span class="installment-price">ou <b>6x</b> de <b>R$6,70</b></span>
                                      </a>
                                      <a href="#" class="btn btn-lg btn-gaaf-second">Comprar</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <?php endwhile;
                      wp_reset_postdata();
                      endif;
                  ?>
                <a class="carousel-control-prev" href="#destaques" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#destaques" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="section-products-featured section section-gaaf">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="section-title text-center mb-3">
                    <h3>Destaque</h3>
                </div>
            </div>
            <div class="d-none d-lg-flex">
                <?php

                $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand');
                $wc_query = new WP_Query($params);
                ?>
                <?php if ($wc_query->have_posts()) : ?>
                    <?php while ($wc_query->have_posts()) :
                        $wc_query->the_post();
                        $product = wc_get_product(get_the_ID()); ?>
                        <div class="col-2">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="images" class="img-responsive img-product">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="product-name"><?php the_title() ?></span>
                                        <?php $woo_prices = woocommerce_prices($product);
                                        if ($woo_prices['type'] == 'variable' ) {
                                            if($woo_prices['on_sale']){ ?>
                                                <h6 class="last-price">De: R$<?= $woo_prices['regular_price'] ?></h6>
                                                <h5 class="price">Por R$<?= $woo_prices['sale_price'] ?></h5>
                                                <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                            <?php }else{ ?>
                                                <h5 class="price">Por R$<?= $woo_prices['regular_price'] ?></h5>
                                                <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                            <?php } ?>
                                            <?php
                                        } else { ?>
                                            <?php if($woo_prices['on_sale']){ ?>
                                                <h6 class="last-price">De: R$ <s><?= $woo_prices['regular_price'] ?></s></h6>
                                                <h5 class="price">Por R$<?= $woo_prices['sale_price'] ?></h5>
                                                <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                            <?php }else{ ?>
                                                <h5 class="price">Por R$<?= $woo_prices['regular_price'] ?></h5>
                                                <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $woo_prices['parcelas'] ?></b></span>
                                            <?php } ?>
                                        <?php } ?>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-gaaf-second">Comprar</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="d-md-block d-lg-none carousel-mobile-gaaf">
                <div id="destaques" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#destaques" data-slide-to="0" class="active"></li>
                        <li data-target="#destaques" data-slide-to="1"></li>
                        <li data-target="#destaques" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner row w-100 mx-auto">
                        <?php
                        $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand');
                        $wc_query = new WP_Query($params);
                        if ($wc_query->have_posts()) :
                            while ($wc_query->have_posts()) :
                                $wc_query->the_post();
                                $product = wc_get_product(get_the_ID());
                                ?>

                                <div class="carousel-item col-12 active">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="inner-box">
                                                <div class="img_holder">
                                                    <a href="#">
                                                        <img src="<?= img; ?>/gallery/1.jpg" alt="images" class="img-responsive img-product">
                                                    </a>
                                                </div>
                                                <div class="image-content text-center">
                                                    <a href="#">
                                                        <span class="product-name">Nome do produto</span>
                                                        <h6 class="last-price">De: R$59,99</h6>
                                                        <h5 class="price">Por R$39,99</h5>
                                                        <span class="installment-price">ou <b>6x</b> de <b>R$6,70</b></span>
                                                    </a>
                                                    <a href="#" class="btn btn-lg btn-gaaf-second">Comprar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                        <a class="carousel-control-prev" href="#destaques" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#destaques" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function(){
        $(".btn-filter").click(function(){
            var filter = $(this).attr('data-filter');
            $("#input-price-filter").val(filter);
            $("#form-price-filter").submit();
        });
    });
</script>

<?php get_footer(); ?>

