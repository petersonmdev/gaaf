<?php get_header(); ?>
<?php
$has_filter = false;
    if( $_POST['has-filter'] == 'true' ){
        $has_filter = true;
        $filter = [];
        $filter['s']          = !empty($_POST['busca']) ? $_POST['busca'] : null; //$_POST['busca'];
        $filter['category']   = !empty($_POST['cat-filter']) ? $_POST['cat-filter'] : null; //$_POST['cat-filter'];
        $filter['price']      = !empty($_POST['price-filter']) ? $_POST['price-filter'] : null;
        $filter['color']      = !empty($_POST['color-filter']) ? $_POST['color-filter'] : null; //$_POST['color-filter'];
        $filter['size']       = !empty($_POST['size-filter']) ? $_POST['size-filter'] : null; //$_POST['size-filter']; //!empty($_POST['size-filter']) ? $_POST['size-filter'] : ['p', 'm', 'g', 'gg'];
        $filter['material']   = !empty($_POST['material-filter']) ? $_POST['material-filter'] : null; //$_POST['material-filter'];
        //print_r($filter);
    }
?>

    <!-- Breadcrumb -->
    <section class="section-gaaf section section-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="items-breadcrumb">
                      <ul class="list-unstyled">
                        <li class='d-inline'><a href="<?= home_url() ?>" title="">Home</a></li>
                        <li class='d-inline'><i class="flaticon-arrow-point-to-right"></i></li>
                        <li class='d-inline'><a href="#" title="">Biquinis</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb -->

    <!--Main container -->
    <section class="section section-gaaf section-main-container section-products">
      <main role="main" class="container">
        <div class="row">
          <aside class="col-4 d-lg-block d-none filter-sidebar filter-gaaf">
              <form action="" method="post">
                <div class="content-filter-gaaf">
                  <div class="section-title text-center mt-3 mb-3">
                    <h5>Filtrar</h5>
                  </div>
                  <div class="p-3 mb-3 rounded">
                    <h4 class="subtitle-gaaf mb-2">Categorias</h4>
                    <input type="hidden" name="cat-filter" value="">
                    <ol id="cat-filter" class="list-unstyled list-filter-gaaf mb-2">
                        <?php $terms = get_terms( 'product_cat', array('hide_empty' => false, 'parent' => 0) );
                        foreach ( $terms as $term ) : ?>
                            <li><a class="cat-filter" data-selected="<?= $term->slug ?>"><?= $term->name ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                  </div>

                  <div class="p-3 mb-3 rounded">
                    <h4 class="subtitle-gaaf mb-2">Preço</h4>
                    <div class="slidecontainer">
                      <div class="row content-text-filter-price">
                        <div class="col-6 text-left">
                          <p>R$ <span id="valuePriceFilter"></span>,00</p>
                        </div>
                        <div class="col-6 text-right">
                          <p>R$ 100,00</p>
                        </div>
                      </div>
                      <input type="range" name="price-filter" min="1" max="100" value="<?= !empty($filter['price']) ? $filter['price'] : null; ?>" class="slider" id="filterPrice">
                    </div>
                  </div>

                  <div class="p-3 mb-3 rounded content-color-filter">
                    <h4 class="subtitle-gaaf mb-2">Cor predominante</h4>
                    <div class="container">
                      <input type="hidden" name="color-filter" value="">
                      <ul id="color-filter" class="row list-unstyled mb-1 justify-content-md-center">
                          <?php $terms = get_terms( 'pa_cores', array('hide_empty' => false, 'parent' => 0) );
                          foreach ( $terms as $term ) : ?>
                              <li class="d-inline mr-2 mb-2">
                                  <a href="#" data-selected="<?= $term->slug ?>" class="btn btn-lg btn-gaaf-third p-4 color-filter"  style="background: <?= $term->description ?>"></a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>

                  <div class="p-3 mb-3 rounded content-size-filter">
                    <h4 class="subtitle-gaaf mb-2">Tamanho</h4>
                    <div class="container">
                      <input type="hidden" name="size-filter" value="">
                      <ul id="size-filter" class="row list-unstyled mb-1 justify-content-md-center">
                          <?php $terms = get_terms( 'pa_tamanho', array('hide_empty' => false, 'parent' => 0) );
                          foreach ( $terms as $term ) : ?>
                              <li class="d-inline mr-2 mb-2">
                                  <a href="#" data-selected="<?= $term->slug ?>" class="btn btn-lg btn-gaaf-third size-filter"><?= $term->name ?></a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>

                  <div class="p-3 mb-3 rounded">
                    <h4 class="subtitle-gaaf mb-2">Material</h4>
                    <input type="hidden" name="material-filter" value="">
                    <ol id="material-filter" class="list-unstyled list-filter-gaaf mb-2">
                        <?php $terms = get_terms( 'pa_material', array('hide_empty' => false, 'parent' => 0) );
                        foreach ( $terms as $term ) : ?>
                            <li><a href="#" class="material-filter" data-selected="<?= $term->slug ?>"><?= $term->name ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                  </div>

                  <div class="p-3 mb-0 rounded">
                      <input type="hidden" name="has-filter" value="true">
                      <button type="submit" class="btn btn-lg btn-gaaf btn-gaaf-first">Filtrar</button>
                  </div>
              </form>

              <form id="reset-filter" action="" method="post">
                  <div class="p-3 mb-3 rounded" style="display: <?= $has_filter == true ? 'block' : 'none' ?>">
                      <input type="hidden" name="has-filter" value="false">
                      <button type="submit" class="btn btn-lg btn-block btn-gaaf btn-gaaf-second">Limpar Filtros</button>
                  </div>
              </form>

          </aside>
          <!-- /.blog-sidebar -->
          <div class="col-lg-8 col-md-12 container-main container-main-gaaf">
            <div class="content-all-products">
              <div class="row align-items-center">
                  <?php
                      if($has_filter && !empty($filter['s'])){
                          $params = array(
                              'post_type' => 'product',
                              'posts_per_page' => 9,
                              's' => $filter['s']
                          );
                      }
                      else if($has_filter){
                          $params = array(
                              'post_type' => 'product',
                              'posts_per_page' => 9,
                              'product_cat' => $filter['category'],

                              'meta_query' => array(
                                  'relation' => 'OR',
                                  array(
                                      'key' => '_price',
                                      'value' => $filter['price'],
                                      'type' => 'NUMERIC',
                                      'compare' => '>='
                                  ),
                                  array(
                                      'key' => '_sale_price',
                                      'value' => $filter['price'],
                                      'type' => 'NUMERIC',
                                      'compare' => '>='
                                  )
                              ),

                              'tax_query' => array(
                                  'relation' => 'OR',
                                  array(
                                      'taxonomy' => 'pa_cores',
                                      'field' => 'slug',
                                      'terms' => $filter['color'],
                                      'include_children' => false,
                                      'operator' => 'IN'
                                  ),
                                  array(
                                      'taxonomy' => 'pa_material',
                                      'field' => 'slug',
                                      'terms' => $filter['material'],
                                      'include_children' => false,
                                      'operator' => 'IN'
                                  ),
                                  array(
                                      'taxonomy' => 'pa_tamanho',
                                      'field' => 'slug',
                                      'terms' => $filter['size'],
                                      'include_children' => false,
                                      'operator' => 'IN'
                                  ),
                              ),

                          );
                      }else{
                          $params = array('posts_per_page' => 9, 'post_type' => 'product');
                      }

                      $wc_query = new WP_Query($params);
                  ?>
                  <?php if ( $wc_query->have_posts() ) : ?>
                  <?php while ( $wc_query->have_posts() ) :
                  $wc_query->the_post();
                  $product = wc_get_product( get_the_ID() ); ?>
                    <div class="col col-lg-4 col-xs-6 col-sm-4 col-md-4 mb-4">
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
              <div class="align-items-center mb-5">
                <a href="#" class="btn btn-lg btn-gaaf btn-gaaf-first">Ver mais</a>
              </div>
            </div>

          </div>
          <!-- /.blog-main -->

        </div>
        <!-- /.row -->
      </main>
      <!--End Main container -->
    </section>
    
    <script type="text/javascript">
      var slider = document.getElementById("filterPrice");
      var output = document.getElementById("valuePriceFilter");
      output.innerHTML = slider.value;

      slider.oninput = function() {
        output.innerHTML = this.value;
      };

      jQuery(document).ready(function(){
          $(".cat-filter").click(function(e){
            e.preventDefault();
            $("#cat-filter li > a").removeClass("active");
            $(this).addClass("active");
            var category = $(this).attr('data-selected');
            $("input[name=cat-filter]").val(category);
          });
          $(".color-filter").click(function(e){
              e.preventDefault();
              $("#color-filter li > a").removeClass("active");
              $(this).addClass("active");
              var color = $(this).attr('data-selected');
              $("input[name=color-filter]").val(color);
          });
          $(".size-filter").click(function(e){
              e.preventDefault();
              $("#size-filter li > a").removeClass("active");
              $(this).addClass("active");
              var size = $(this).attr('data-selected');
              $("input[name=size-filter]").val(size);
          });
          $(".material-filter").click(function(e){
              e.preventDefault();
              $("#material-filter li > a").removeClass("active");
              $(this).addClass("active");
              var material = $(this).attr('data-selected');
              $("input[name=material-filter]").val(material);
          });
         /* $("#filterPrice").change(function(e){
              alert( $(this).val() );
              var price = $(this).val();
              $("input[name=price-filter]").val(price);
          });*/

         //$("#reset-filter").css({""})
      });
    </script>

<?php get_footer(); ?>

