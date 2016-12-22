<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="col-md-6 outer">
        <img src="http://www.vipdovana.lt/wp-content/uploads/2016/09/woocommerce.jpg" style="width:70%;">
      </div>

      <div class="col-md-6">

      <h2>Pakabuko Generatorius</h2>
  <div class="form-group">
    <label for="numeris">Valstybinis automobilio numeris</label>
    <input type="text" class="form-control" id="numeris" name="numeris" placeholder="ABC 123">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kita pakabuko pusė</label>
    <select class="form-control" id="numeris2" name="numeris2">
      <option>Bmw</option>
      <option>Lada</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    <small id="numeriaiHelp" class="form-text text-muted">Jei norite teksto arba blablaba rašykite pastabose</small>
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Pastabos</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Jūsų paveikslėlio įkėlimas</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Jei norite savo paveikslėlio, įkelkite jį čia.</small>
  </div>
  <button type="submit" class="btn btn-lg btn-success">Užsisakyti</button>
</form>

        </div>

        </div>

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
