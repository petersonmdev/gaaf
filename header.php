<!DOCTYPE html>
<html lang="pt-BR">

<?php 

// um número no formato internacional (ativo no WhatsApp)
$number = '5562984426692';
$numberprint = '(62) 98442-6692';
// o texto ou algo vindo de um <textarea> ou <input> por exemplo
$msg = 'Olá, vim do Ecommerce GAAF, poderia me ajudar?';

// montar o link (número e texto) (web)
$targetWeb = 'https://api.whatsapp.com/send?phone='.urldecode($number).'&text='.urldecode($msg).'';

// montar o link (número e texto) (app)
$targetApp = 'whatsapp://send?phone='.urldecode($number).'&text='.urldecode($msg).'';

$isMobile = (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$_SERVER['HTTP_USER_AGENT'])||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4)))

?>

<head>
  <meta charset="utf-8">
  <title>Gaaf | Moda Praia</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="<?= plugins; ?>/slick/slick.css">
  <link rel="stylesheet" href="<?= plugins; ?>/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="<?= plugins; ?>/fancybox/jquery.fancybox.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= plugins; ?>/bootstrap.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="<?= plugins; ?>/animate.min.css">

  <!-- Stylesheets -->
  <link href="<?= css; ?>/style.css" rel="stylesheet">

  <!-- Stylesheets Gaaf-->
  <link href="<?= css; ?>/gaaf.css" rel="stylesheet">

  <!-- Fontes -->
  <link rel="stylesheet" type="text/css" href="<?= css; ?>/fontawesome.min.all.css">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?= img; ?>/gaaf-favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?= img; ?>/gaaf-favicon.ico" type="image/x-icon">

    <?php wp_head(); ?>

</head>


<body <?php body_class() ?>>
  <div class="page-wrapper">
    <!--header top-->
    <div class="header-top d-none d-lg-block">
      <div class="container clearfix">
        <div class="top-right content-wpp-contact">
          <h6>AUTOATENDIMENTO 
            <?php 
              if ( $isMobile ) {
                echo '<a href="'.$targetApp.'"><i class="fab fa-whatsapp"></i> '.$numberprint.'</a>';
              } else {
                echo '<a href="'.$targetWeb.'"><i class="fab fa-whatsapp"></i> '.$numberprint.'</a>';
              }
            ?>
          </h6>
        </div>
      </div>
    </div>
    <?php 
      if ( $isMobile ) {
        echo '<a href="'.$targetApp.'" class="btn-wpp-mobile d-md-flex d-lg-none animated infinite pulse delay-2s">';
      } else {
        echo '<a href="'.$targetWeb.'" class="btn-wpp-mobile d-md-flex d-lg-none animated infinite pulse delay-2s">';
      }
    ?>
      <i class="fab fa-whatsapp"></i>
    </div>
    <!--header top-->

    <!--Header Upper-->
    <section class="header-uper d-none d-lg-block">
      <div class="container clearfix">
        <div class="row content-header-gaaf">
          <div class="logo col-2">
            <figure>
              <a href="<?= home_url() ?>">
                <img src="<?= img; ?>/logo.png" alt="" width="130">
              </a>
            </figure>
          </div>

          <div class="center-side col-md-5 col-sm-10">
              <form action="<?php echo home_url(); ?>" role="search" method="get" class="search">
                  <div class="input-group">
                      <input class="form-control inpt-gaaf" type="search" name="s" placeholder="Procure no site..." value="<?php echo get_search_query() ?>">
                      <input type="hidden" name="has-filter" value="true">
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-gaaf" type="submit"><i class="flaticon-search"></i></button>
                      </div>
                  </div>
              </form>
          </div>

          <div class="right-side col-5 d-sm-none d-md-block">
            <div class="row">
              <ul class="contact-info action-header">
                <li class="item">
                  <a href="/minha-conta">
                    <div class="icon-box icon-box-gaaf-circle">
                      <i class="flaticon-woman"></i>
                    </div>
                    <strong>Entre</strong><br>
                    <span>ou cadastre-se</span>
                  </a>
                </li>
                <li class="item">
                  <a href="/carrinho">
                    <div class="icon-box icon-box-gaaf-no-circle">
                      <i class="flaticon-cart"></i>
                      <i class="contador-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></i>
                    </div>
                    <strong>Minhas compras</strong>
                    <br>
                    <span>R$ <?php echo WC()->cart->get_subtotal(); ?> (Subtotal)</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>  
      </div>
    </section>
    <!--Header Upper-->


    <!--Main Header-->
    <nav class="navbar navbar-default navbar-light navbar-gaaf">
      <div class="container">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <nav class="navbar navbar-expand-lg w-100">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="logo logo-mobile d-md-block d-lg-none">
            <figure>
              <a href="#">
                <img src="<?= img; ?>/logo.png" alt="" width="130">
              </a>
            </figure>
          </div>
          <div class="d-md-block d-lg-none">
            <ul class="contact-info action-header">
              <li class="item d-inline">
                <a href="register.php">
                  <div class="icon-box icon-box-gaaf-circle">
                    <i class="flaticon-woman"></i>
                  </div>
                </a>
              </li>
              <li class="item d-inline">
                <a href="/carrinho">
                  <div class="icon-box icon-box-gaaf-no-circle">
                    <i class="flaticon-cart"></i>
                    <i class="contador-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></i>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php 
                wp_nav_menu( array(
                'theme_location'  => 'primary',
                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav nav-fill w-100',
                'add_li_class'    => 'nav-item'
              ) );
            ?>
            
          </div>
        </nav>
      </div>
      <!-- /.container-fluid -->
    </nav>
    <nav class="nav-content-search d-md-block d-lg-none">
      <div class="container">
        <div class=row>
          <div class="col-12">
              <form action="<?php echo get_site_url(); ?>/search.php" method="post">
                <div class="input-group">
                    <input class="form-control inpt-gaaf" type="text" name="busca" placeholder="Procure no site...">
                    <input type="hidden" name="has-filter" value="true">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-gaaf" type="submit"><i class="flaticon-search"></i></button>
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </nav>
    <!--End Main Header -->
