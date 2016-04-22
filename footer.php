<?php global $language;?>
</div><!-- //container_12 -->
<footer id="footer">
	<div class="container_12">
		<div class="grid_4">
		  <?php if($language == 'en-US'):?><h4>Pages</h4>
			<?php else:?><h4>Páginas</h4><?php endif;?>
		  <?php wp_nav_menu( array( 'menu_class' => 'bottom-menu', 'theme_location' => 'top_menu', 'container' => 'ul') ); ?>
		</div><!--//grid_4-->
		<?php $my_query = new WP_Query('showposts=1&post_type=footer_info'); ?>
		<?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
		<div class="grid_4">
		  <h4><?php the_title();?></h4>
		  <?php the_content();?>
		</div><!--//grid_4-->
		<div class="grid_4 copyright">
			<h4>Cria Ideias - <?php echo date('Y');?></h4>
		  <?php if($language == 'en-US'):?><p>all rights reserved. <br/>developed by cria ideias.</p>
			<?php elseif($language == 'es-ES'):?><p>todos los derechos reservados. <br/>desarrollado por cria ideias.</p>
			<?php else:?><p>todos os direitos reservados. <br/>desenvolvido por cria ideias.</p><?php endif;?>
			<img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo_copy.png" alt="Cria Ideias" id="copy_logo" />
		</div><!--//grid_4-->
		<?php endwhile; endif; wp_reset_query(); ?>
	</div><!--//container_12-->
</footer><!-- //footer -->
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.6.2.min.js"></script>
<?php if(is_home()):?>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.quicksand.js"></script>
<?php endif;?>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cria_general.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cria_parallax.js"></script>
<?php	wp_footer(); ?>
</body>
</html>