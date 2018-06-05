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

				<div class="col-md-8">
					<h3 class="subtitle">PROJECTS</h3>
					<div id="container">
						<div id="content" role="main">

							<div class="post-list home-gradient-list">
								<!-- <?php the_field('field_list_style'); ?> -->
								<?php
								$cats = get_categories(); 	
								foreach ($cats as $cat) {
									$cat_id= $cat->term_id;

									$argsQuery = array(
										'posts_per_page' => 100,
										'cat' => $cat_id,
										'category__not_in' => 5 ,
									);; 

									echo "<div class='post-item-list'>";
										// echo "<div class='post-cat'>".$cat->name."</div>";
									echo "<div class='row'>";

									query_posts($argsQuery);

									if (have_posts()) : while (have_posts()) : the_post(); ?>
									<a class="post-item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" href="<?php the_permalink();?>">
										<div class="post-item-content ">

											<div class="content-frame">

												<div class="home-gradient-bg <?php the_field('color'); ?>"></div>
												<?php 
												if (has_post_thumbnail()) {
													echo "<div class='content-bg' style='background-image:url(". get_the_post_thumbnail_url() . ")'></div>";
												}else{
													echo "<div class='content-bg' style='background-image:url(". get_site_url() . "/wp-content/uploads/2018/02/null.png)'></div>";
												}
												?>


												<div class="content">
													<?php get_post(); ?>

													<div class="title"><?php the_title(); ?></div>

													<div class="date"><?php echo get_the_date(); ?></div>	
												</div>	
											</div>

										</div>
									</a>
								<?php endwhile; endif; wp_reset_postdata();?>
								<?php echo "</div>"; ?>
							</div>
							<?php } // done the foreach statement ?>

						</div>

					</div>
				</div>
			</div>

			<div class="col-md-4">


				<h3 class="subtitle">ARTICLES</h3>
				<?php	

				$argsQuery = array(
					'posts_per_page' => 100,
					'cat' => 5
				);; 

				echo "<div class='post-item-list'>";
								// echo "<div class='post-cat'>".$cat->name."</div>";

				query_posts($argsQuery);

				if (have_posts()) : while (have_posts()) : the_post(); ?>
				<a class="post-item-link" href="<?php the_permalink();?>">

					<div class="title"><?php the_title(); ?></div>

					<div class="date"><?php echo get_the_date(); ?></div>	

				</a>
				<?php endwhile; endif; wp_reset_postdata();?>


				<h3 class="subtitle m-t-lg">Tools</h3>
				<?php 
				  $pages = get_pages(); 
				  foreach ( $pages as $page ) {
				  	if ($page->ID != 9){

				  		?>
							<a class="post-item-link" href="<?php echo get_page_link( $page->ID );?>">

								<div class="title"><?php echo $page->post_title ?></div>

								<div class="date"><?php  echo $page->post_date; ?></div>	

							</a>

				  		<?php 
				  	}
				  }
				 ?>
			</div>

		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
