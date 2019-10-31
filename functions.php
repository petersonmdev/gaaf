<?php
// Parcelamento global no site 6X
define('parcelas', 6);

// Assets
define('fonts', get_template_directory_uri() . '/webfonts');
define('plugins', get_template_directory_uri() . '/plugins');
define('img', get_template_directory_uri() . '/images');
define('css', get_template_directory_uri() . '/css');
define('js', get_template_directory_uri() . '/js');


add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    )
);

add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
} );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );

/**
 * Adding bootstrap classes to woocommerce checkout form
 *
 * @param $fields
 * @return mixed
 */
function wti_add_bootstrap_to_checkout_fields($fields) {
    foreach ($fields as $fieldset) {
        foreach ($fieldset as $field) {
            // Add form-group class around the label and the input
            $field['class'][] = 'form-group';

            // Add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wti_add_bootstrap_to_checkout_fields');




/*/////////////////////////////////////////////////////////////////////
//////////// WOOCOMMERCE
/////////////////////////////////////*/

/*-- GET PRODUCT PRICES --*/
function woocommerce_prices($product){
    if ( $product->is_type('simple') ) {
        if($product->is_on_sale()){
            $parcelas = number_format($product->get_sale_price() / parcelas, '2', '.', ',');
            $r = ['type' => 'simple', 'on_sale' => true, 'regular_price' => $product->get_regular_price(), 'sale_price' => $product->get_sale_price(), 'parcelas' => $parcelas];
        }else{
            $parcelas = number_format($product->get_regular_price() / parcelas, '2', '.', ',');
            $r = ['type' => 'simple', 'on_sale' => false, 'regular_price' => $product->get_regular_price(), 'parcelas' => $parcelas];
        }
    }else{
        $variations = $product->get_available_variations();
        foreach ($variations as $variation) {
            $display_regular_price[] = $variation['display_regular_price'];
            $display_price[] = $variation['display_price'];
        }
        if($product->is_on_sale()){
            $regular_price = min($display_regular_price);
            $sale_price = min($display_price);
            $parcelas = number_format($sale_price / parcelas, '2', '.', ',');
            $r = ['type' => 'variable', 'on_sale' => true, 'regular_price' => $regular_price, 'sale_price' => $sale_price, 'parcelas' => $parcelas];
        }else{
            $regular_price = min($display_regular_price);
            $parcelas = number_format($regular_price / parcelas, '2', '.', ',');
            $r = ['type' => 'variable', 'on_sale' => false, 'regular_price' => $regular_price, 'parcelas' => $parcelas];
        }
    }
    return $r;
}
/*-- GET CART ITEMS  --*/
/*function get_cart_items(){
    $cart = WC()->cart->get_cart();
    foreach( $cart as $cart_item ){
        $product = wc_get_product( $cart_item['product_id'] );
        $product->get_name();
        $r[] =
    }
}*/



// Remove Country field from shipping calculator
add_filter('woocommerce_shipping_calculator_enable_country','__return_false');

function custom_override_checkout_fields( $fields )
{
    unset($fields['billing']['billing_country']);
    return $fields;
}
add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');

/*///////////////////////////////////////////////
////////// REGISTRA OS MENUS DO SITE
////////////////////////////*/
register_nav_menus(array(
    'primary' => __('Principal', 'gaaf'),
    'footer-col1' => __('Categorias', 'gaaf'),
    'footer-col2' => __('Empresa', 'gaaf'),
    'footer-col3' => __('Minha Conta', 'gaaf'),    
    'footer-col4' => __('Atendimento', 'gaaf')
));

function add_additional_class_on_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_link($classes, $item, $args) {
    if($args->add_link_class) {
        $classes[] = $args->add_link_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_link', 10, 4);