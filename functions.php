<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'roseta-themefonts' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

//------------EXCERPT------------------
function strip_shortcode_from_excerpt( $content ) {
  $content = strip_shortcodes( $content );
  return $content;
}
add_filter('the_excerpt', 'strip_shortcode_from_excerpt');


// function new_excerpt_length($length) {
//    return 20;
// }
// add_filter('excerpt_length', 'new_excerpt_length');

add_action( 'woocommerce_after_shop_loop_item', 'output_product_excerpt', 35 );


function output_product_excerpt() {

global $post, $product;
echo "<div class='prod_desc'><strong>";
    $product_cats = wp_get_post_terms($product->id, 'product_cat');
    $count = count($product_cats);
    foreach($product_cats as $key => $cat)
    {
        echo $cat->name;
        if($key < ($count-1))
        {
            echo ', ';
        }
        else
        {
            echo ' ';
        }
    }

	

if (get_the_terms( $post->ID, 'product_tag' )) {
    $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
}

    if ($tag_count) {echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( '', '', $tag_count, 'woocommerce' ) . ' ', '.</span>' );}


echo "</strong></div><br>"; 
the_excerpt();
echo "<br><a class='button' href='".$product->get_permalink()."'>Learn More</a>";


}

// Remove additional information tab
add_filter( 'woocommerce_product_tabs', function( $tabs ) {
	unset( $tabs['additional_information'] );
	return $tabs;
}, 98 );

// Insert additional information into description tab
add_filter( 'woocommerce_product_tabs', function( $tabs ) {
	$tabs['description']['callback'] = function() {
		global $product;
		wc_get_template( 'single-product/tabs/description.php' );
		if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
			wc_get_template( 'single-product/tabs/additional-information.php' );
		}
	};
	return $tabs;
}, 98 );

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );