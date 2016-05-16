<?php global $language;?>
<?php get_header(); ?>
	<ul class="tags">
		<?php if($language == 'en-US'):?>
			<?php $tags = get_terms( 'post_tag' ); ?>
			<li><a href="<?php bloginfo('url');?>" rel="tudo" title="Filter portfolio">All</a></li>
		<?php elseif($language == 'es-ES'):?>
			<?php $tags = get_terms( 'post_tag' ); ?>
			<li><a href="<?php bloginfo('url');?>" rel="tudo" title="Filtrar portafolio">Todo</a></li>
		<?php else:?>
			<?php $tags = get_terms( 'post_tag' ); ?>
			<li><a href="<?php bloginfo('url');?>" rel="tudo" title="Filtrar portfólio">Tudo</a></li>
		<?php endif;?>
		<?php foreach($tags as $tag):?>
			<?php
				$pattern = '/(\w+)((\_\$)+(\w+)$)/i';
				$replacement = '${1}';
				$tag_readable = preg_replace($pattern, $replacement, $tag->name);
			;?>
			<li><a href="<?php bloginfo('url');?>/tag/<?=$tag->slug;?>" rel="tag-<?=$tag->slug;?>" title="Filtrar portfólio"><?=$tag_readable;?></a></li>
		<?php endforeach;?>
	</ul>
	<article id="folio_container" class="row">
  <?php query_posts(array($query_string, 'showposts'=>'-1', 'post_type'=>'post', 'orderby'=>'menu_order', 'order'=>'ASC'));?>
	<?php get_template_part( 'loop', 'index' ); ?>
	</article>
<?php get_footer(); ?>