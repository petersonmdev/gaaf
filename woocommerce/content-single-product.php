<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<section class="section-gaaf section section-breadcrumb">
    <div class="container">
        <div class="items-breadcrumb d-block">
            <ul class="list-unstyled d-block">
                <li class='d-inline'><a href="#" title="">Home</a></li>
                <li class='d-inline'><i class="flaticon-arrow-point-to-right"></i></li>
                <li class='d-inline'><a href="#" title="">Mais vendidos</a></li>
                <li class='d-inline'><i class="flaticon-arrow-point-to-right"></i></li>
                <li class='d-inline'><a href="#" title="">Biquinis</a></li>
                <li class='d-inline'><i class="flaticon-arrow-point-to-right"></i></li>
                <li class='d-inline'><a href="#" title="">Estampados</a></li>
                <li class='d-inline'><i class="flaticon-arrow-point-to-right"></i></li>
                <li class='d-inline'><a href="#" title="">Lançamentos</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End breadcrumb -->

    <!--Main container -->
    <section class="section section-gaaf section-product">
        <div class="container">
            <div class="row">
                <div class="col-2 d-lg-block d-none carousel-vertical">
                    <ul class="list-unstyled nav nav-tabs" id="myTab" role="tablist">
                        <li class="d-block nav-item" data-target="#productSimple" data-slide-to="0">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#img0" role="tab" aria-controls="img0" aria-selected="true">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="images" class="img-responsive img-product">
                            </a>
                        </li>
                        <?php
                            $gallery_ids = $product->get_gallery_image_ids();
                            $i = 1;
                            foreach( $gallery_ids as $gallery_id ) {
                                $image_link = wp_get_attachment_url( $gallery_id );
                            ?>
                                <li class="d-block nav-item" data-target="#productSimple" data-slide-to="<?=$i?>">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#img<?=$i?>" role="tab" aria-controls="img<?=$i?>" aria-selected="true">
                                        <img src="<?=$image_link?>" alt="images" class="img-responsive img-product">
                                    </a>
                                </li>
                        <?php $i++; } ?>
                    </ul>
                </div>
                <div class="col-xs-5 col-lg-5 col-md-6 col-sm-12 image-product d-flex mb-5">
                    <div id="productSimple" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#productSimple" data-slide-to="0" class="active"></li>
                            <?php $i=1; foreach( $gallery_ids as $gallery_id ) : ?>
                                <li data-target="#productSimple" data-slide-to="<?=$i?>" class=""></li>
                            <?php $i++; endforeach; ?>
                        </ol>
                        <div class="carousel-inner tab-content">
                            <div class="carousel-item tab-pane active" id="img0">
                                <img class="d-block w-100" src="<?= get_the_post_thumbnail_url() ?>" alt="img0">
                            </div>
                            <?php $i=1; foreach( $gallery_ids as $gallery_id ) :
                                $image_link = wp_get_attachment_url( $gallery_id );
                            ?>
                                <div class="carousel-item tab-pane" id="img<?=$i?>">
                                    <img class="d-block w-100" src="<?= $image_link; ?>" alt="img<?=$i?>">
                                </div>
                            <?php $i++; endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#productSimple" role="button" data-slide="prev">
                            <span class="flaticon-arrow-point-to-right" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productSimple" role="button" data-slide="next">
                            <span class="flaticon-arrow-point-to-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-5 col-lg-5 col-md-6 col-sm-12 content-information-product">
                    <form action="<?php the_permalink(); ?>" method="post" enctype="multipart/form-data">
                        <div class="content-title-product mb-2">
                            <h3 class="title-product"><?= $product->get_name(); ?></h3>
                            <h6 class="reference-product"><?= $product->get_sku() ? $product->get_sku() : ''; ?></h6>
                        </div>
                        <div class="content-rating-product">
                            <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                            <ul class="list-unstyled">
                                <li class="d-inline"><i class="fas fa-star"></i></li>
                                <li class="d-inline"><i class="fas fa-star"></i></li>
                                <li class="d-inline"><i class="fas fa-star"></i></li>
                                <li class="d-inline"><i class="fas fa-star"></i></li>
                                <li class="d-inline"><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="content-price-product mb-4">
                            <div class="text-price-product mb-4">
                                <?php $the_product = woocommerce_prices($product);
                                if ($the_product['type'] == 'variable' ) {
                                    if($the_product['on_sale']){ ?>
                                        <h3 class="last-price"><s>R$<?= $the_product['regular_price'] ?></s></h3>
                                        <h1 class="price">R$<?= $the_product['sale_price'] ?></h1>
                                        <h4 class="installment-price">ou <b><?=parcelas?>x</b> de <b><?= $the_product['parcelas'] ?></b> sem juros</h4>
                                    <?php }else{ ?>
                                        <h1 class="price">R$<?= $the_product['regular_price'] ?></h1>
                                        <h4 class="installment-price">ou <b><?=parcelas?>x</b> de <b><?= $the_product['parcelas'] ?></b> sem juros</h4>
                                    <?php } ?>
                                <?php
                                } else { ?>
                                    <?php if($the_product['on_sale']){ ?>
                                        <h3 class="last-price"><s>R$<?= $the_product['regular_price'] ?></s></h3>
                                        <h1 class="price">R$<?= $the_product['sale_price'] ?></h1>
                                        <h4 class="installment-price">ou <b><?=parcelas?>x</b> de <b><?= $the_product['parcelas'] ?></b> sem juros</h4>
                                    <?php }else{ ?>
                                        <h1 class="price">R$<?= $the_product['regular_price'] ?></h1>
                                        <h4 class="installment-price">ou <b><?=parcelas?>x</b> de <b><?= $the_product['parcelas'] ?></b> sem juros</h4>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="content-price-product mb-4">
                            <h6 class="mb-2">Quantidade:</h6>
                            <input type="number" class="form-control" step="1" min="1" max="" name="quantity" value="1" title="Qtd" size="4" inputmode="numeric">
                        </div>

                        <?php
                            $terms = wc_get_product_terms( $product->get_id(), 'pa_tamanho', array( 'fields' => 'all') );
                            if($terms) :
                        ?>
                        <div class="content-select-size mb-4">
                            <h6 class="mb-2">Tamanho:</h6>
                            <!--<select id="pa_tamanho" class="" name="attribute_pa_tamanho" data-attribute_name="attribute_pa_tamanho" data-show_option_none="yes"><option value="">Escolha uma opção</option><option value="p" class="attached enabled">P</option><option value="m" class="attached enabled">M</option><option value="g" class="attached enabled">G</option><option value="gg" class="attached enabled">GG</option><option value="xg" class="attached enabled">XG</option></select>-->
                            <input type="hidden" id="pa_tamanho" name="attribute_pa_tamanho" value="" data-attribute_name="attribute_pa_tamanho">
                            <ul class="list-unstyled mb-1 justify-content-start nav nav-tabs">
                                <?php
                                    foreach ($terms as $term) { ?>
                                        <li class="d-inline mr-2 mb-2">
                                            <button type="button" id="<?= $term->slug ?>" class="btn btn-light btn-lg btn-pa_tamanho" ><?= $term->name ?></button>
                                        </li>
                                    <?php }
                                ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php
                            $terms = wc_get_product_terms( $product->get_id(), 'pa_cores', array( 'fields' => 'all') );
                            if($terms) :
                        ?>
                        <div class="content-select-size mb-4">
                            <h6 class="mb-2">Cor:</h6>
                            <!--<select id="pa_tamanho" class="" name="attribute_pa_tamanho" data-attribute_name="attribute_pa_tamanho" data-show_option_none="yes"><option value="">Escolha uma opção</option><option value="p" class="attached enabled">P</option><option value="m" class="attached enabled">M</option><option value="g" class="attached enabled">G</option><option value="gg" class="attached enabled">GG</option><option value="xg" class="attached enabled">XG</option></select>-->
                            <input type="hidden" id="pa_cores" name="attribute_pa_cores" value="" data-attribute_name="attribute_pa_cores">
                            <ul class="list-unstyled mb-1 justify-content-start nav nav-tabs">
                                <?php
                                foreach ($terms as $term) { ?>
                                    <li class="d-inline mr-2 mb-2">
                                        <button type="button" id="<?= $term->slug ?>" class="btn btn-light btn-lg btn-pa_cores" ><?= $term->name ?></button>
                                    </li>
                                <?php }
                                //print_r($terms);
                                //print_r(woocommerce_prices($product));
                                ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php
                            $terms = wc_get_product_terms( $product->get_id(), 'pa_material', array( 'fields' => 'all') );
                            if($terms) :
                        ?>
                            <div class="content-select-size mb-4">
                                <h6 class="mb-2">Material:</h6>
                                <!--<select id="pa_tamanho" class="" name="attribute_pa_tamanho" data-attribute_name="attribute_pa_tamanho" data-show_option_none="yes"><option value="">Escolha uma opção</option><option value="p" class="attached enabled">P</option><option value="m" class="attached enabled">M</option><option value="g" class="attached enabled">G</option><option value="gg" class="attached enabled">GG</option><option value="xg" class="attached enabled">XG</option></select>-->
                                <input type="hidden" id="pa_material" name="attribute_pa_material" value="" data-attribute_name="attribute_pa_material">
                                <ul class="list-unstyled mb-1 justify-content-start nav nav-tabs">
                                    <?php
                                    foreach ($terms as $term) { ?>
                                        <li class="d-inline mr-2 mb-2">
                                            <button type="button" id="<?= $term->slug ?>" class="btn btn-light btn-lg btn-pa_cores" ><?= $term->name ?></button>
                                        </li>
                                    <?php }
                                    //print_r($terms);
                                    //print_r(woocommerce_prices($product));
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="cta-product">
                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-gaaf btn-gaaf-cta">comprar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 description-product mt-4">
                    <div class="product-post collapse" id="descriptionProduct">
                        <h2 class="product-post-title">Descrição do produto</h2>
                        <?php the_content(); ?>
                    </div>
                    <a class="btn btn-gaaf btn-gaaf-first btn-gaaf-see-more collapsed" data-toggle="collapse" href="#descriptionProduct" role="button" aria-expanded="false" aria-controls="descriptionProduct"></a>
                </div>
            </div>
        </div>
    </section>


<section class="section section-gaaf section-product-sugestion mb-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-3">
                    <h3>Talvez você se interesse</h3>
                </div>
            </div>
            <div id="sugestions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#sugestions" data-slide-to="0" class="active"></li>
                    <li data-target="#sugestions" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner row w-100 mx-auto">
                    <div class="carousel-item col-12 active">
                        <div class="row">

                            <?php
                            $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand');
                            $wc_query = new WP_Query($params);
                            if ($wc_query->have_posts()) :
                                while ($wc_query->have_posts()) :
                                    $wc_query->the_post();
                                    $ids[] = get_the_ID();
                                    $product = wc_get_product( get_the_ID() );
                                    ?>
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-12 mb-4">
                                        <div class="inner-box">
                                            <div class="img_holder">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="images" class="img-responsive img-product">
                                                </a>
                                            </div>
                                            <div class="image-content text-center">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="product-name"><?php the_title() ?></span>

                                                    <?php $the_product = woocommerce_prices($product);
                                                    if ($the_product['type'] == 'variable' ) {
                                                        if($the_product['on_sale']){ ?>
                                                            <h6 class="last-price">De: R$<?= $the_product['regular_price'] ?></h6>
                                                            <h5 class="price">Por R$<?= $the_product['sale_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php }else{ ?>
                                                            <h5 class="price">Por R$<?= $the_product['regular_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php } ?>
                                                        <?php
                                                    } else { ?>
                                                        <?php if($the_product['on_sale']){ ?>
                                                            <h6 class="last-price">De: R$ <s><?= $the_product['regular_price'] ?></s></h6>
                                                            <h5 class="price">Por R$<?= $the_product['sale_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php }else{ ?>
                                                            <h5 class="price">Por R$<?= $the_product['regular_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </a>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-gaaf-second">Comprar</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        </div>
                    </div>
                    <div class="carousel-item col-12">
                        <div class="row">

                            <?php
                            $params = array('posts_per_page' => 6, 'post_type' => 'product', 'orderby' => 'rand', 'post__not_in' => $ids);
                            $wc_query = new WP_Query($params);
                            if ($wc_query->have_posts()) :
                                while ($wc_query->have_posts()) :
                                    $wc_query->the_post();
                                    $ids[] = get_the_ID();
                                    $product = wc_get_product( get_the_ID() );
                                    ?>
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-12 mb-4">
                                        <div class="inner-box">
                                            <div class="img_holder">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="images" class="img-responsive img-product">
                                                </a>
                                            </div>
                                            <div class="image-content text-center">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="product-name"><?php the_title() ?></span>

                                                    <?php $the_product = woocommerce_prices($product);
                                                    if ($the_product['type'] == 'variable' ) {
                                                        if($the_product['on_sale']){ ?>
                                                            <h6 class="last-price">De: R$<?= $the_product['regular_price'] ?></h6>
                                                            <h5 class="price">Por R$<?= $the_product['sale_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php }else{ ?>
                                                            <h5 class="price">Por R$<?= $the_product['regular_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php } ?>
                                                        <?php
                                                    } else { ?>
                                                        <?php if($the_product['on_sale']){ ?>
                                                            <h6 class="last-price">De: R$ <s><?= $the_product['regular_price'] ?></s></h6>
                                                            <h5 class="price">Por R$<?= $the_product['sale_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php }else{ ?>
                                                            <h5 class="price">Por R$<?= $the_product['regular_price'] ?></h5>
                                                            <span class="installment-price">ou <b>6x</b> de <b>R$ <?= $the_product['parcelas'] ?></b></span>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </a>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-gaaf-second">Comprar</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#sugestions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#sugestions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<script !src="">
    jQuery(document).ready(function(){
        $(".btn-pa_tamanho").click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).removeAttr('style');
                return;
            }
            $(this).addClass('active');
            $('.btn-pa_tamanho').removeAttr('style');
            var tamanho = $(this).attr("id");
            $("#pa_tamanho").val(tamanho);
            $(this).css({'background':'#64b161', 'color':'#fff'});
        });
        $(".btn-pa_cores").click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).removeAttr('style');
                return;
            }
            $(this).addClass('active');
            $('.btn-pa_cores').removeAttr('style');
            var cor = $(this).attr("id");
            $("#pa_cores").val(cor);
            $(this).css({'background':'#64b161', 'color':'#fff'});
        });
        $(".btn-pa_material").click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).removeAttr('style');
                return;
            }
            $(this).addClass('active');
            $('.btn-pa_material').removeAttr('style');
            var cor = $(this).attr("id");
            $("#pa_material").val(cor);
            $(this).css({'background':'#64b161', 'color':'#fff'});
        });
    });
</script>


