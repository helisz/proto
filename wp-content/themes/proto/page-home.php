<?php
/**
 * Template Name: [[ Home Page ]]
 */

get_header();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main"> 
		<div class="home-page">
			<div class="row">
				<div class="col-md-5">
					<div class="big-icon">
						<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/home-1.svg">
					</div>
					
				</div>
				<div class="col-md-7">


					<div id="container">
						<div id="content" role="main">

							<div class="home-post-list">

								<?php
								$cats = get_categories(); 

								foreach ($cats as $cat) {
									$cat_id= $cat->term_id;
									echo "<div class='post-item-list'>";
									echo "<div class='post-cat'>".$cat->name."</div>";
									query_posts("cat=$cat_id&posts_per_page=100");
									if (have_posts()) : while (have_posts()) : the_post(); ?>
									<a class="post-item" href="<?php the_permalink();?>">
										<div class="icon">
											<?php 
											if (has_post_thumbnail()) {
												echo the_post_thumbnail();
											}else{
												echo "<img src='" . get_site_url() . "/wp-content/uploads/2018/02/null.png'>";
											}
											?>
										</div>
										<div class="content">
											<div class="title"><?php the_title(); ?></div>
											<div class="date">Update: <?php echo get_the_date(); ?></div>	
										</div>							
									</a>
									<?php endwhile; endif; ?>
								</div>
								<?php } // done the foreach statement ?>

							</div>

						</div>

					</div><!-- #content -->
				</div><!-- #container -->


			</div>
		</div>

	</div>

	<!-- 	<?php get_template_part( 'template-parts/template-home-slider', '' ); ?>

		<?php get_template_part( 'template-parts/template-home-prdmenu', '' ); ?>

		<?php get_template_part( 'template-parts/template-flexible-area', '' ); ?> -->

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
