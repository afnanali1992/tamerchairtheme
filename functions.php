<?php
// require get_template_directory_uri() . '/navwalker.php';

require get_template_directory() . '/navwalker.php';

function load_stylesheets()
{
    wp_register_style('style',get_template_directory_uri().'/css/style.css',array(),1,'all');
    wp_enqueue_style('style');

    wp_register_style('responsive',get_template_directory_uri().'/css/responsive.css',array(),1,'all');
    wp_enqueue_style('responsive');

    wp_register_style('custom',get_template_directory_uri().'/custom.css',array(),1,'all');
    wp_enqueue_style('custom');

   if (pll_current_language() == 'ar'){
    wp_register_style('custom_ar',get_template_directory_uri().'/custom-ar.css',array(),1,'all');
    wp_enqueue_style('custom_ar');
   }
 

}
 add_action('wp_enqueue_scripts','load_stylesheets');

 function addjs(){
     wp_register_script('jquery',get_template_directory_uri().'/vendor/jquery.2.2.3.min.js',array(),1,1,1);
     wp_enqueue_script('jquery');

     wp_register_script('popper',get_template_directory_uri().'/vendor/popper.js/popper.min.js',array(),1,1,1);
     wp_enqueue_script('popper');

     wp_register_script('bootstrap',get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js',array(),1,1,1);
     wp_enqueue_script('bootstrap');

     wp_register_script('mega-menu',get_template_directory_uri().'/vendor/mega-menu/assets/js/custom.js',array(),1,1,1);
     wp_enqueue_script('mega-menu');

     wp_register_script('aos-next',get_template_directory_uri().'/vendor/aos-next/dist/aos.js',array(),1,1,1);
     wp_enqueue_script('aos-next');

     wp_register_script('WOW-master',get_template_directory_uri().'/vendor/WOW-master/dist/wow.min.js',array(),1,1,1);
     wp_enqueue_script('WOW-master');

     wp_register_script('owl-carousel',get_template_directory_uri().'/vendor/owl-carousel/owl.carousel.min.js',array(),1,1,1);
     wp_enqueue_script('owl-carousel');

     wp_register_script('ajaxchimp',get_template_directory_uri().'/vendor/ajaxchimp/jquery.ajaxchimp.min.js',array(),1,1,1);
     wp_enqueue_script('ajaxchimp');

     wp_register_script('fancybox',get_template_directory_uri().'/vendor/fancybox/dist/jquery.fancybox.min.js',array(),1,1,1);
     wp_enqueue_script('fancybox');

     wp_register_script('tilt',get_template_directory_uri().'/vendor/tilt.jquery.js',array(),1,1,1);
     wp_enqueue_script('tilt');

     wp_register_script('theme',get_template_directory_uri().'/js/theme.js',array(),1,1,1);
     wp_enqueue_script('theme');

     wp_register_script('custom',get_template_directory_uri().'/custom.js',array(),1,1,1);
     wp_enqueue_script('custom');
 }

 add_action('init', 'addjs');



//  Menu Functions 
 
 add_theme_support('menus');

 register_nav_menus(
     array(
         'header' => 'Header',
         'footer' => 'Footer'

     )
     );


//Add class for the item menu  >> li
// function add_class_on_li($classes, $item, $args) {
//     if($args->theme_location === 'header' || $args->theme_location === 'header___ar') {
//         $classes[] = 'nav-item dropdown';
//     }

//     if (in_array('current-menu-item', $classes) ){
//         $classes[] = 'nav-item dropdown active ';
//       }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_class_on_li', 10, 3 );


// Add class to link angor <a>  in item menu 
// function add_link_atts($atts,$item,$args) {

//     if( !$item->has_children && $item->menu_item_parent > 0 ) {
//         $atts['class'] = "dropdown-item";
//     }
//     elseif ( $args->has_children && 0 === $depth || $item->mega_menu && 0 === $depth ) {
//         $atts['class'] = 'nav-link dropdown-toggle';
//         $atts['data-toggle'] = 'dropdown';
//     }
//    else{
//     $atts['class']="nav-link";
 
//    }
//     return $atts;
//   }
//   add_filter( 'nav_menu_link_attributes', 'add_link_atts',10, 3);


// // override Submenu Classes
//   function overrideSubmenuClasses( $classes ) {
//     $classes[] = 'dropdown-menu';

//     return $classes;
// }
// add_action('nav_menu_submenu_css_class', 'overrideSubmenuClasses');



// function register_navwalker(){
// 	require_once get_template_directory().'/navwalker.php';
// }
// add_action( 'after_setup_theme', 'register_navwalker' );


	
add_theme_support( 'post-thumbnails' );
the_post_thumbnail(); // Without parameter ->; Thumbnail
the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)

 

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'rmcc_post_listing_parameters_shortcode' );
function rmcc_post_listing_parameters_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'category_name' => $category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
     	<div class="our-blog version-five pt-110 pb-150 md-pb-120">
		<div class="container">
        
					<div class="row masnory-blog-wrapper">
						
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="isotop-item col-lg-4 col-md-6">
			<div class="single-team-member blog-post-block-two mb-75 md-mb-50">
            <div class="img-holder"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
            <div class="post">
									<ul class="post-info">
										<li><a href="#"><?php the_title(); ?> .</a></li>
										<li><a href="#"><?php the_date('j F, Y'); ?></a></li>
									</ul>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a></h4>
									<p> <?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more inline-button-one">Continue Reading</a>
								</div> <!-- /.post -->

    </div>
    </div>
            <?php endwhile;
            // wp_reset_postdata(); ?>
    </div>
    </div>
    </div>
   
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}