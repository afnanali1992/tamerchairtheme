<?php get_header();?>
		<!--
			=====================================================
				Project Gallery
			=====================================================
			-->
			<div class="project-gallery-home-one pos-r md-pt-20">
				<div class="container">
					<div class="d-md-flex align-items-center justify-content-between pos-r">
						<div class="theme-title-one">
							<div class="upper-title mb-5">Porject</div>
							<h2 class="main-title">Project <i>Gallery.</i></h2>
						</div> <!-- /.theme-title-one -->
						<a href="portfolio-v1.html" class="theme-btn solid-button-one button-rose sm-mt-40">View Gallery</a>
					</div>
				</div>
				 <!-- /.container -->

				<div class="slider-item-wrapper">
					<div class="home-gallery-slider">
						<div class="item">
							<div class="gallery-polar-state">
								<div class="img-holder pos-r">
									<img src="<?php bloginfo('template_directory')?>/images/gallery/img1.jpg" alt="">
									<a href="<?php bloginfo('template_directory')?>/images/gallery/img1.jpg" class="icon zoom fancybox" data-fancybox="images" data-caption="My caption">+</a>
								</div> <!-- /.img-holder -->
							</div> <!-- /.gallery-polar-state -->
						</div>
						<div class="item">
							<div class="gallery-polar-state">
								<div class="img-holder pos-r">
									<img src="<?php bloginfo('template_directory')?>/images/gallery/img2.jpg" alt="">
									<a href="<?php bloginfo('template_directory')?>/images/gallery/img2.jpg" class="icon zoom fancybox" data-fancybox="images" data-caption="My caption">+</a>
								</div> <!-- /.img-holder -->
							</div> <!-- /.gallery-polar-state -->
						</div>
						<div class="item">
							<div class="gallery-polar-state">
								<div class="img-holder pos-r">
									<img src="<?php bloginfo('template_directory')?>/images/gallery/img3.jpg" alt="">
									<a href="<?php bloginfo('template_directory')?>images/gallery/img3.jpg" class="icon zoom fancybox" data-fancybox="images" data-caption="My caption">+</a>
								</div> <!-- /.img-holder -->
							</div> <!-- /.gallery-polar-state -->
						</div>
					</div>
				</div> <!-- /.slider-item-wrapper -->
			</div> 
			<!-- /.project-gallery-home-one -->

<?php get_footer();?>