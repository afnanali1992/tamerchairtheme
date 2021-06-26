<?php


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
function add_class_on_li($classes, $item, $args) {
    if($args->theme_location === 'header' || $args->theme_location === 'header___ar') {
        $classes[] = 'nav-item dropdown';
    }

    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'nav-item dropdown active ';
      }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_on_li', 10, 3 );


// Add class to link angor <a>  in item menu 
function add_link_atts($atts,$item,$args) {

    if( !$item->has_children && $item->menu_item_parent > 0 ) {
        $atts['class'] = "dropdown-item";
    }
    // elseif($args->has_children && (1 === $depth)) {
    //     $atts['class']="nav-link dropdown-toggle";
    //     $atts['data-toggle']="dropdown";
    // }
   else{
    $atts['class']="nav-link";
 
   }
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts',10, 2);


// override Submenu Classes
  function overrideSubmenuClasses( $classes ) {
    $classes[] = 'dropdown-menu';

    return $classes;
}
add_action('nav_menu_submenu_css_class', 'overrideSubmenuClasses');



public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    if($depth == 0) {
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\" >\n";
    }
    if($depth == 1) {
        $output .= "\n$indent<ul role=\"menu\" class=\" second_depth_dropdown dropdown-menu\" >\n";
    }
}

/**
 * Start El.
 *
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @access public
 * @param mixed $output Passed by reference. Used to append additional content.
 * @param mixed $item Menu item data object.
 * @param int   $depth (default: 0) Depth of menu item. Used for padding.
 * @param array $args (default: array()) Arguments.
 * @param int   $id (default: 0) Menu item ID.
 * @return void
 */
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $value = '';
    $class_names = $value;
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

    if ( $args->has_children && 0 === $depth || $item->mega_menu ) {
        $class_names .= ' dropdown';
    }

    if ( $args->has_children && 0 === $depth ) {
        $class_names .= ' position-relative';
    }

    if ( $args->has_children && 1 === $depth ) {
        $class_names .= ' dropdown-submenu dropdown';
    }

    if ( in_array( 'current-menu-item', $classes, true ) ) {
        $class_names .= ' active';
    }
    if ( in_array( 'menu-item', $classes, true ) && 0 === $depth ) {
        $class_names .= ' nav-item';
    }
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    $output .= $indent . '<li itemscope="itemscope" ' . $id . $value . $class_names . '>';
    $atts = array();

    $atts['target'] = ! empty( $item->target )	? $item->target	: '';
    $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
    // If item has_children add atts to a.
    if ( $args->has_children && 0 === $depth || $item->mega_menu && 0 === $depth ) {
        $atts['class'] = 'nav-link dropdown-toggle';
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
    }
    elseif( 0 === $depth ) {
        $atts['class'] = 'nav-link';
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
    }
    elseif ( $args->has_children && (1 === $depth) ) {
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        $atts['class'] = 'dropdown-item dropdown-toggle ';
    }
    else {
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        $atts['class'] = 'dropdown-item';
    }
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }
    }
    $item_output = $args->before;
    /*
     * Glyphicons/Font-Awesome
     * ===========
     * Since the the menu item is NOT a Divider or Header we check the see
     * if there is a value in the attr_title property. If the attr_title
     * property is NOT null we apply it as the class name for the glyphicon.
     */
    /*
         * Glyphicons
         * ===========
         * Since the the menu item is NOT a Divider or Header we check the see
         * if there is a value in the attr_title property. If the attr_title
         * property is NOT null we apply it as the class name for the glyphicon.
         */
    if ( ! empty( $item->attr_title ) )
        $item_output .= '<a'. $attributes .'>';
    else
        $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ( $args->has_children && 1 === $depth ) ? ' <span class="arrow_carrot-right"></span> </a>' : esc_attr( $item->attr_title ) . '&nbsp;</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

}