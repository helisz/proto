<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article class="post-template" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="row">
		<div class="col-md-8 col-md-pull-4">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );

				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">

					<?php the_field('color'); ?>
					<?php wp_bootstrap_starter_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->
		</div>
		<div class="col-md-4 col-md-push-8 post-thumbnail text-right">
			<!-- <?php the_post_thumbnail(); ?> -->
		</div>
	</div>

	
	<div class="entry-content">
		<?php
		if ( is_single() ) :
			the_content();
		else :
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
