<?php
global $language;
$language = get_bloginfo('language');
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-BR">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '', true);?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/print.css" media="print" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="<?php bloginfo('template_url');?>/js/modernizr.js" type="text/javascript" charset="utf-8"></script>

</head>
<?php $fundos = array('espaco', 'oceano', 'medieval', 'invaders'); shuffle($fundos); ?>
<?php $fundo = $fundos[0]; ?>
<body <?php body_class($fundo); ?>>
<div id="backgrounds">
<?php if($fundo == 'espaco'):?>
	<img id="img_astronauta" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/astro.png" alt="Astronauta" />
	<img id="img_nave" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/xwing.png" alt="Nave" />
	<img id="img_sol" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/sol.png" alt="Sol" />
	<img id="img_planeta_nw" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/planeta_nw.png" alt="Planeta NW" />
	<img id="img_planeta_ne" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/planeta_ne.png" alt="Planeta NE" />
	<img id="img_planeta_sw" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/espaco/planeta_sw.png" alt="Planeta SW" />
<?php elseif($fundo == 'oceano'):?>
	<div id="img_ancora" class="parallax_bg"></div>
	<img id="img_navio" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/navio.png" alt="Navio" />
	<img id="img_coral_sw" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/coral_sw.png" alt="Corais" />
	<img id="img_coral_se" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/coral_se.png" alt="Corais" />
	<img id="img_aguas_vivas" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/aguas_vivas.png" alt="Aguas Vivas" />
	<img id="img_tartaruga" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/tartaruga.png" alt="Tartaruga" />
	<img id="img_bolhas" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/bolhas.png" alt="Bolhas" />
	<img id="img_tubarao" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/oceano/tubarao.png" alt="Tubarão" />
<?php elseif($fundo == 'invaders'):?>
	<img id="img_top_clouds" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/invaders/top_clouds.png" alt="Nuens" />
	<img id="img_bottom_clouds" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/invaders/bottom_clouds.png" alt="Nuvens" />
	<div id="img_city" class="parallax_bg">
		<div id="img_city_front"></div>
		<div id="img_city_middle"></div>
		<div id="img_invader">
			<img id="img_abducted" src="<?php bloginfo('template_url');?>/images/invaders/abducted_house.png" alt="Casa abduzida" />
		</div>
		<div id="cars_area">
			<img id="img_car_a" src="<?php bloginfo('template_url');?>/images/invaders/car_a.png" alt="Carro" />
			<img id="img_car_b" src="<?php bloginfo('template_url');?>/images/invaders/car_b.png" alt="Carro" />
			<img id="img_car_c" src="<?php bloginfo('template_url');?>/images/invaders/car_c.png" alt="Carro" />
			<img id="img_car_d" src="<?php bloginfo('template_url');?>/images/invaders/car_d.png" alt="Carro" />
		</div>
		<img id="img_robot" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/invaders/robot.png" alt="Robô" />
		<img id="img_dinosaur" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/invaders/dinosaur.png" alt="Dinossauro" />
	</div>
<?php elseif($fundo == 'medieval'):?>
	<div id="img_colinas" class="parallax_bg"></div>
	<div id="img_colinas_bg" class="parallax_bg"></div>
	<!-- <img id="img_dragao" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/dragao.png" alt="Dragão" /> -->
	<img id="img_montanha" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/montanha.png" alt="Montanha" />
	<img id="img_montanha_bg" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/montanha_bg.png" alt="Montanha Fundos" />
	<img id="img_nuvens_left" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/nuvens_left.png" alt="Nuvens" />
	<img id="img_nuvens_right" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/nuvens_right.png" alt="Nuvens" />
	<img id="img_yeti" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/yeti.png" alt="yeti" />
	<img id="img_warrior" class="parallax_bg" src="<?php bloginfo('template_url');?>/images/medieval/warrior.png" alt="Guerreiro" />
<?php endif;?>
</div>
<header id="header" class="container_12">
	<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> - <small><?php bloginfo( 'description' ); ?></small></a></h1>
</header>
<div id="main" class="container_12">
	<aside class="flags">
		<a href="/language/pt/"><img src="<?php bloginfo('template_url');?>/images/brazil-flag.png" alt="Site em português" class="flag"></a>
		<a href="/language/en/"><img src="<?php bloginfo('template_url');?>/images/uk-flag.png" alt="Website in english" class="flag"></a>
		<a href="/language/es/"><img src="<?php bloginfo('template_url');?>/images/spain-flag.png" alt="Sitio en español" class="flag"></a>
	</aside>
	<div class="grid_12">
	<?php wp_nav_menu( array( 'menu_class' => 'top-menu', 'theme_location' => 'top_menu', 'container' => 'ul') ); ?>
	</div>
