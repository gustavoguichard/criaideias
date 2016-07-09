<?php
/**
 * Template Name: Ajax Page
 *
 * @package WordPress
 * @subpackage Cria Ideias
 * @since Gustavo Guichard 2012
 */

$page = $_GET['offset'];
$lang = $_GET['lang'];
$tag = $_GET['tag'];
$showposts = get_option('posts_per_page');
$offset = $page * $showposts;
echo $tag;

query_posts(array($query_string, 'showposts'=>$showposts, 'offset'=>$offset, 'post_type'=>'post', 'orderby'=>'menu_order', 'order'=>'ASC', 'lang'=>$lang, 'tag_id'=>$tag));?>
<?php get_template_part( 'loop', 'index' ); ?>
