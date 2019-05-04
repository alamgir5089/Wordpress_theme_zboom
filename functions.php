<?php 

function zboom_default_functions(){
   add_theme_support('title-tag');
   add_theme_support('post-thumbnails');
   add_theme_support('custom-background');

//register menu
   load_theme_textdomain('zboom',get_template_directory_uri().'/languages');

   if(function_exists('register_nav_menu')){
   register_nav_menu('main-menu',__('Main Menu','zboom'));
   }

//Readmore

function read_more($limit){
   $post_content = explode(" ", get_the_content());

   $less_content = array_slice($post_content, 0, $limit);
   echo implode(" ", $less_content);
}

}
add_action('after_setup_theme','zboom_default_functions');
/* Finish of function zboom_default_functions */


//enqueue scripts for CSS & JS
//CSS file
function zboom_css_and_js(){
wp_enqueue_style('zerogrid', get_template_directory_uri().'/css/zerogrid.css', null,'v1.0', 'all');
wp_enqueue_style('style', get_template_directory_uri().'/css/style.css', null,'v1.0', 'all');
wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css', null,'v1.0', 'all');
wp_enqueue_style('responsiveslides', get_template_directory_uri().'/css/responsiveslides.css', null,'v1.0', 'all');

//Js file
wp_enqueue_script('jquery');
wp_enqueue_script('responsiveslides', get_template_directory_uri().'/js/responsiveslides.js', 'jquery','v1.0', 'true');
wp_enqueue_script('mainjs', get_template_directory_uri().'/js/main.js', 'jquery','v1.0', 'true');

}
add_action('wp_enqueue_scripts', 'zboom_css_and_js');




// custom post & slider
add_action('init','slider_gallery');
function slider_gallery() {
   register_post_type('customslider' , array(
       'labels' => array(
         'name' => 'Sliders',
         'add_new_item' => 'Add New Slider',
      ),
      'public' => true,
      'supports' => array(
         'title', 'thumbnail'
      ),
      'menu_position' => 7,
      'menu_icon' => get_template_directory_uri().'/images/slider.png'
   ));

//custom Blocks
   register_post_type('customservice', array(
      'labels' =>array(
         'name' => 'Blocks',
         'add_new_item' =>__('Add New Block', 'zboom')
      ),
      'public' => true,
      'supports' =>array('title','editor')
   ));

//Gallery
   register_post_type('zboomgallery', array(
      'labels' =>array(
         'name' => 'Gallery',
         'add_new_item' =>__('Add New Gallery Item', 'zboom')
      ),
      'public' => true,
      'supports' =>array('title','editor','thumbnail')
   ));

   }

//Widget Register (Sidebar)

function widgets_sidebar(){
   register_sidebar( array(
   'name'          => __( 'Right Sidebar','zboom' ),
   'id'            => 'right-sidebar',
   'before_widget' => '<div class="box">',
   'after_widget'  => '</div></div>',
   'before_title'  => '<div class="heading"><h2>',
   'after_title'   => '</h2></div><div class="content">',
) );

//Widget Register (Contact Right Sidebar)

   register_sidebar( array(
   'name'          => __('Contact Right Sidebar','zboom'),
   'id'            => 'contact-sidebar',
   'before_widget' => '<div class="box">',
   'after_widget'  => '</div></div>',
   'before_title'  => '<div class="heading"><h2>',
   'after_title'   => '</h2></div><div class="content">',
) );

//Widget Register (footer)
register_sidebar( array(
   'name'          => __( 'Footer Widgets','zboom' ),
   'id'            => 'footer-widget',
   'before_widget' => '<div class="col-1-4">
   <div class="wrap-col">
      <div class="box">',
   'after_widget'  => '</div></div></div></div>',
   'before_title'  => '<div class="heading"><h2>',
   'after_title'   => '</h2></div><div class="content">',
) );

}
add_action( 'widgets_init', 'widgets_sidebar' );





// Inclusion of Redux from lib folder
require_once(get_template_directory().'/lib/ReduxCore/framework.php');
require_once(get_template_directory().'/lib/sample/config.php');
