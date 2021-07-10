<?php get_header();?>
  

<?php if(has_post_thumbnail());?>
 
			<div class="inner-banner pos-r banner-bg bg-style-two" style="background-image:  url(<?php the_post_thumbnail_url(); ?>); ">
				<div class="opacity">
					<div class="container">
						<p><?php $category = get_the_category();
$firstCategory = $category[0]->cat_name; echo $firstCategory;?></p>
						<h2> <?php the_title(); ?> </h2>
					</div>
				</div>
			</div> <!-- /.inner-banner -->
            <div class="our-blog blog-details pt-150 pb-200 md-pt-120 md-pb-120">
				<div class="container">
					<div class="row">
<?php the_content();?>
</div>
</div>
</div>
<?php get_footer();?>