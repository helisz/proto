<?php
/**
 * Template Name: Tool - JSON Duplicates Remover
 */

get_header();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'notitle' );
			endwhile; // End of the loop. ?>

			<style type="text/css">
			textarea{
				width: 100%;
				height: 500px;
				border: none;
				font-size: 10px;
				font-family: Monaco, Consolas, serif;
				background: transparent;
				color: rgba(255,255,255,0.8);
				border: 1px solid rgba(255,255,255,0.4);
			}
		</style>

		<h1>JSON Duplicates Remover</h1>
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-default" id="clean" style="width: 300px">Clean</button>
				<button class="btn btn-default" id="cleanFormat" style="width: 200px">Clean and Format</button>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6">
				<h3 class="subtitle">With Duplicates</h3>
				<textarea class="dirtyRes" placeholder="// Input original JSON here"></textarea><br/>
			</div>
			<div class="col-md-6">
				<h3 class="subtitle">Without Duplicates</h3>
				<textarea class="cleanRes" placeholder="// Get your results here"></textarea>
			</div>
		</div>

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script>

			jQuery("#clean").click( function() {
				try {
					var dirty = JSON.parse( jQuery(".dirtyRes").val().trim() );
				} catch (e) {
				  alert(e); // You get an error.
				}
				var cleaned = removeDuplicates(dirty);
				console.log(cleaned);
				jQuery(".cleanRes").val( JSON.stringify(cleaned) );
				});
			jQuery("#cleanFormat").click( function() {
				try {
					var dirty = JSON.parse( jQuery(".dirtyRes").val().trim() );
				} catch (e) {
				  alert(e); // You get an error.
				}
				var cleaned = removeDuplicates(dirty);
				console.log(cleaned);
				jQuery(".cleanRes").val( JSON.stringify(cleaned, null, "\t"));
			});

			function removeDuplicates(json_all) {
				var arr = [],
				collection = [];

				$.each(json_all, function (index, value) {
					if ($.inArray(value.name, arr) == -1) {
						arr.push(value.name);
						collection.push(value);
					}
				});
				return collection;
			}


		</script>



	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();



