<?php 

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' );

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

add_action('wpt_footer', 'wpt_cart_checkout_link');

function wpt_cart_checkout_link () {
	global $woocommerce;

	if ( (sizeof( $woocommerce->cart->cart_contents) > 0) && (!is_cart() && !is_checkout() ) ) :
		echo '<a class="button" href="' . $woocommerce->cart->get_cart_url() . '" title="' . __( 'Cart' ) . '">' . __( 'Cart' ) . '</a>';
		echo '<a class="button alt" href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>';
	endif;
}

/**
 * The following hook will add a input field right before "add to cart button"
 * will be used for getting Name on t-shirt 
 */
function add_name_on_tshirt_field() {
    echo '<table class="variations" cellspacing="0">
          <tbody>
              <tr>
              <td class="label"><label for="color">Name On T-Shirt</label></td>
              <td class="value">
                  <input type="text" name="properties[name-on-tshirt]" value="" />
              </td>
              <td class="label"><label for="color">Name font color</label></td>
              <td class="value">
					<input type="text" name="properties[name-font-colour]" value="" />
			</td>
			<td class="label"><label for="color">Name On T-Shirt</label></td>
              <td class="value">
					<input type="text" name="properties[name-font-size]" value="" />                     
              </td>
          </tr>                               
          </tbody>
      </table>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_name_on_tshirt_field' );



function save_name_on_tshirt_field( $cart_item_data, $product_id ) {
    if( isset( $_REQUEST['name-on-tshirt'] ) ) {
        $custom_data = $_REQUEST['properties'];
		WC()->session->set(  $cart_item_key.'_name_on_tshirt', sanitize_title(  $custom_data['name-on-tshirt']  )  );
		WC()->session->set(  $cart_item_key.'_name_font_colour', sanitize_title(  $custom_data['name-font-colour']  )  );
		WC()->session->set(  $cart_item_key.'_name_font_size', sanitize_title(  $custom_data['name-font-size']  )  );
        /* below statement make sure every add to cart action as unique line item */
        $cart_item_data['unique_key'] = md5( microtime().rand() );
    }
    return $cart_item_data;
}
add_action( 'woocommerce_add_cart_item_data', 'save_name_on_tshirt_field', 10, 2 );

function render_meta_on_cart_and_checkout( $cart_data, $cart_item = null ) {
    $custom_items = array();
    /* Woo 2.4.2 updates */
    if( !empty( $cart_data ) ) {
        $custom_items = $cart_data;
    }
    if( isset( $cart_item['name_on_tshirt'] ) ) {
        $custom_items[] = array( "name" => 'Name On T-Shirt', "value" => $cart_item['name_on_tshirt'] );
    }
    return $custom_items;
}
add_filter( 'woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 10, 2 );

function tshirt_order_meta_handler( $item_id, $values, $cart_item_key ) {
    if( isset( $values['name_on_tshirt'] ) ) {
        wc_add_order_item_meta(  $item_id, "name_on_tshirt", WC()->session->get(  $cart_item_key.'_name_on_tshirt' )  );  
		wc_add_order_item_meta(  $item_id, "name_font_colour", WC()->session->get(  $cart_item_key.'_name_font_colour' )  );
		wc_add_order_item_meta(  $item_id, "name_font_size", WC()->session->get(  $cart_item_key.'_name_font_size' )  );
    }
}
add_action( 'woocommerce_add_order_item_meta', 'tshirt_order_meta_handler', 1, 3 );

function wpt_custom_billing_field ( $fields = array() ) {
	unset($fields['billing_company']);
	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_country']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
	unset($fields['billing_phone']);



	echo '<pre>';
	//var_export($fields);
	echo '</pre>';

	return $fields;
}
add_filter('woocommerce_billing_fields', 'wpt_custom_billing_field');

function wpt_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );

function register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu' 	=> __( 'Primary Menu', 'treehouse-portfolio' )			
		)
	);

}
add_action( 'init', 'register_theme_menus' );


function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


function wpt_theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . 'http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js' );
	//wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'font-awesome', 'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

function wpt_theme_js() {

	wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );	
	wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );		

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );








?>