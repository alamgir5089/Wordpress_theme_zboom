<?php get_header() ;?>

<?php  
/* 
Template Name:Home
*/
?>

<div class="featured">
	<div class="wrap-featured zerogrid">
		<div class="slider">
			<div class="rslides_container">
				<ul class="rslides" id="slider">
	<!-- Custom slider -->
				<?php 
					$custslider = new WP_Query(array(
						'post_type' => 'customslider',
						'post_per_page' => -1
					));
					?>
					<?php while($custslider->have_posts()): $custslider->the_post();?>

				<?php the_post_thumbnail();?>

				<?php endwhile ;
				?>
				</ul>
			</div>
		</div>
	</div>
</div>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">
<!-- custom Blocks -->
		<?php 
				$custservice = new WP_Query(array(
					'post_type' => 'customservice',
					'post_per_page' => 3
				));
				?>
				<?php while($custservice->have_posts()): $custservice->the_post();?>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2><?php the_title() ;?></h2>
					<?php read_more(30) ;?>... <a href=" <?php the_permalink() ;?>">Read More</a>
				</div>
			</div>
		<?php endwhile ;?>


		</div>

		<div class="row block02">
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>

				<!-- exept index.php any kind of post need to follow this procedure to show -->
				<?php 
					$post_contentsss = new WP_Query(array(
						'post_type' => 'post'
						
					));
				 ?>

				<?php while($post_contentsss->have_posts()) : $post_contentsss->the_post();?>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<?php the_post_thumbnail() ;?>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href=" <?php the_permalink() ;?>"> <?php the_title() ;?></a></h2>
								<div class="info">[By <?php the_author() ;?> on <?php the_time('F d, Y') ;?>
								with <?php comments_popup_link('No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post') ;?>]</div>

								<?php read_more(20) ;?>... <a href=" <?php the_permalink() ;?>">Read More</a>
							</div>
						</div>
					</article>
				<?php endwhile ;?>


				</div>
			</div>
			<div class="col-1-3">
				<?php get_sidebar() ;?>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ;?>