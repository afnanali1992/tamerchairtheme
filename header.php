<?php 
if (pll_current_language() == 'en'):
	get_header( 'en' );
elseif( pll_current_language() == 'ar' ):
	get_header( 'ar' );   
endif
?>

<?php wp_head(); ?>

<!-- Fix Internet Explorer ______________________________________-->
<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
</head>

<body>
	<div class="main-page-wrapper">

		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<!-- Preloader -->
		<!-- <section>
				<div id="preloader">
					<div id="ctn-preloader" class="ctn-preloader">
						<div class="animation-preloader">
							<div class="icon"><img src="images/1.svg" alt=""></div>
							<div class="txt-loading">
								<span data-text-preloader="R" class="letters-loading">
									R
								</span>
								<span data-text-preloader="O" class="letters-loading">
									O
								</span>
								<span data-text-preloader="G" class="letters-loading">
									G
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="N" class="letters-loading">
									N
								</span>
							</div>
						</div>	
					</div>
				</div>
			</section> -->


		<!-- 
			=============================================
				Theme Main Menu
			============================================== 
			-->
		<header>
			<div class="theme-main-menu theme-menu-two main-p-color">

				<div class="d-flex  logo-header row align-items-top justify-content-between">
					<!-- LOGO -->
					<div class="logo lg-3" style="margin-top: -18px;"><a href="index.html"><img src="<?php bloginfo('template_directory')?>/images/logo/tamer-logo-1.png" alt=""></a></div>


					<!-- <div class="logo lg-3"><a href="index.html"><img src="<?php bloginfo('template_directory')?>/images/logo/tamer-logo-2.png" alt=""></a></div> -->
					<!-- <div class="right-content ml-auto order-lg-3">
						<a href="contact-v1.html" class="theme-btn line-button-one button-rose contact-button button-white-bg">Contact us</a>
					</div> -->






					<!-- LOGO -->
					<!-- <div class="logo"><a href="index.html"><img src="<?php bloginfo('template_directory')?>/images/logo/logo.svg" alt=""></a></div> -->


					<nav id="mega-menu-holder" class="navbar navbar-expand-xl lg-2">
						<div class="container nav-container">
							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
								data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<i class="flaticon-setup"></i>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<?php wp_nav_menu(
									   array(
										   'theme_location' => 'header',
										   'container'=> 'ul',
										   'menu_class' => 'navbar-nav',
										   'start_depth'=>  1,
										   'walker'   => new Rogan_Nav_Navwalker(),
									   )
									   ); ?>

								<!-- <ul class="navbar-nav">
								    <li class="nav-item dropdown mega-dropdown-holder active">
							            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Home</a>
							        </li>
								   
								    <li class="nav-item dropdown">
							            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">News.</a>
							            <ul class="dropdown-menu">
								            <li><a href="blog-v1.html" class="dropdown-item">Blog default</a></li>
								            <li><a href="blog-v5.html" class="dropdown-item">Blog filter</a></li>
								            <li><a href="blog-v3.html" class="dropdown-item">Blog Creative</a></li>
								            <li><a href="blog-v4.html" class="dropdown-item">Blog Full Grid</a></li>
									        <li><a href="blog-v2.html" class="dropdown-item">blog 2 Column</a></li>
									        <li><a href="blog-details-v2.html" class="dropdown-item">blog details default</a></li>
									        <li><a href="blog-details-v1.html" class="dropdown-item">blog details full grid</a></li>
							            </ul> 
							        </li>
							   </ul> -->
							</div>
						</div>
					</nav>

					<div class="lg-3 contact-us">
						<a href="contact-v1.html"
							class="theme-btn line-button-one button-rose contact-button button-white-bg">Contact us</a>
					</div>

					<div class="logo lg-3" style="margin-bottom: -12px;"><a href="index.html"><img
								src="<?php bloginfo('template_directory')?>/images/logo/tamer-logo-3.png" alt=""></a>
					</div>

				</div>

			</div> <!-- /.theme-main-menu -->

		</header>