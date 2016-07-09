<?php get_header(); ?>
<?php get_template_part( 'tagslist', 'index' ); ?>
<article id="folio_container">
<?php get_template_part( 'loop', 'index' ); ?>
</article>
<a href="#" class="read-more">carregar mais</a>
<?php get_footer(); ?>