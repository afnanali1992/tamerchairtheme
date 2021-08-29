<?php get_header();?>


<?php if(has_post_thumbnail());?>

<div class="our-blog blog-details blog-details-fg pb-200 md-pb-120">
	<div class="blog-hero-banner" style="background-image:  url(<?php the_post_thumbnail_url(); ?>); ">

		<div class="blog-custom-container">
			<p><?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory;?></p>
			<h2 class="blog-title"> <?php the_title(); ?> </h2>
		</div>

	</div> <!-- /.inner-banner -->
	<div class="blog-fg-data">
		<div class="post-data">
			<div class="blog-custom-container">
				<div class="custom-container-bg">


					<?php the_content();?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>