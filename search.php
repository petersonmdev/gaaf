<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>

    <section class="section-search section section-gaaf">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php
                    $s=get_search_query();
                    $args = array('s' =>$s);
                    // The Query
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) {
                        _e("<h2 class='title-gaaf text-center mb-3'>Buscar resultados para: ".get_query_var('s')."</h2>");
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                            <?php
                        }
                    } else { ?>
                        <h2 class="title-gaaf text-center mb-3">Nada encontrado!</h2>
                        <div class="alert alert-info">
                          <p>Desculpe, mas nada corresponde aos seus critérios de busca. Por favor, tente novamente com algumas palavras-chave diferentes.</p>
                        </div>                        
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>