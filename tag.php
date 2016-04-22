<?php get_header(); ?>
<?php $tags = get_terms( 'post_tag' ); ?>
	<ul class="tags">
		<li><a href="<?php bloginfo('url');?>" rel="tudo" title="Filtrar portfólio">Tudo</a></li>
	<?php foreach($tags as $tag):?>
		<li><a href="<?php bloginfo('url');?>/tag/<?=$tag->slug;?>" rel="tag-<?=$tag->slug;?>" title="Filtrar portfólio"><?=$tag->name;?></a></li>
	<?php endforeach;?>
	</ul>
	<article id="folio_container">
	<?php get_template_part( 'loop', 'index' ); ?>
	</article>
<?php get_footer(); ?>