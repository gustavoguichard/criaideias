<?php
/**
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */


/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):

function twentyten_setup() {
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 220, 140, true );
	add_image_size('page-thumb', 940, 234, true);
	add_image_size('criador-thumb', 200, 200, true);

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top_menu' => __( 'Main Navigation', 'twentyten' )
	) );

}
endif;

/* CUSTOM POST TYPES */
add_action('init', 'my_cpt_init');
function my_cpt_init() 
{
/* CRIADORES */
  $labelsCriador = array(
    'name' => 'Criadores',
    'singular_name' => 'Criador',
    'add_new' => 'Novo Criador',
    'add_new_item' => 'Adicionar novo Criador',
    'edit_item' => 'Editar Criador',
    'new_item' => 'Novo Criador',
    'view_item' => 'Ver Criador',
    'search_items' => 'Procurar Criador',
    'not_found' => 'Não foram encontrados Criadores',
    'not_found_in_trash' => 'Não há Criadores no lixo', 
    'parent_item_colon' => '',
    'menu_name' => 'Criadores'

  );
  $argsCriador = array(
    'labels' => $labelsCriador,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/criador.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title', 'editor','thumbnail')
  );
/* INFO NO RODAPÉ */
  $labelsInfo = array(
    'name' => 'Informação no Rodapé',
    'singular_name' => 'Informação no Rodapé',
    'add_new' => 'Nova Informação no Rodapé',
    'add_new_item' => 'Adicionar nova Informação no Rodapé',
    'edit_item' => 'Editar Informação no Rodapé',
    'new_item' => 'Novo Informação no Rodapé',
    'view_item' => 'Ver Informação no Rodapé', 
    'parent_item_colon' => '',
    'menu_name' => 'Informação no Rodapé'

  );
  $argsInfo = array(
    'labels' => $labelsInfo,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/footer_info.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title', 'editor')
  );
  register_post_type('criador',$argsCriador);
  register_post_type('footer_info',$argsInfo);
  flush_rewrite_rules();
}

function change_post_menu_label() {
		global $menu;
    global $submenu;
    $menu[5][0] = 'Portfólio';
    $menu[5][4] = 'open-if-no-js menu-top';
		$menu[5][6] = get_bloginfo('template_directory') . '/images/icons/portfolio.png';
    $submenu['edit.php'][5][0] = 'Portfólio';
    $submenu['edit.php'][10][0] = 'Novo Trabalho';
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Portfólio';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Opções do Site', 'Opções do Site', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Opções do Site</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>Código do Google Analytics:</strong></p>
	<p>
		<input type="text" name="google_analytics" id="google_analytics" value="<?php echo get_option('google_analytics');?>" />
	</p>
	<p><input type="submit" name="Submit" value="Salvar Alterações" /></p>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="google_analytics" />

	</form>
	</div>
	<?php
}