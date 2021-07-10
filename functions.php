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




function cat_post($atts){

    // attributes for shortcode
   if (isset($atts['cat'])) {$cats = $atts['cat'];} else {return;}
   if (isset($atts['posts_per_page'])) {$posts_per_page = $atts['posts_per_page'];} else {$posts_per_page = -1;}

   // get the category posts
   $category = get_category_by_slug($cat);
   if (!is_object($category)) {return;}
   $args = array(
        'cat' => $category->term_id,
        'posts_per_page' => $posts_per_page,
        'post_type' => 'post',
        'order'  => 'DESC'
   );
   $posts = get_posts($args);

   // create the list output
   if (count($posts) > 0) {
       foreach ($posts as $post) {
           $link = get_permalink($post->ID);
           $title = $post->post_title;
           $image = get_the_post_thumbnail($post->ID, 'thumbnail');
           $output .= '<div id="postrow-'.$post->ID.'" class="postrow">';
           $output .= '<a class="postlink" href="'.$link.'">'.$image;
           $output .= '<h5 class="posttitle">'.$title.'</h5></a></div>';
       }
   return $output;
}
}

add_shortcode( 'knowledge_sharing', 'cat_post' );
