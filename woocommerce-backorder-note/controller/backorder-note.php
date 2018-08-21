<?php // Add field to product
function backorder_note_meta(){ ?>
	<div class="stock_fields show_if_simple show_if_variable">
        <p class="form-field">
            <label for="_backorder_note">Backorder note</label>
            <input type="text" class="short" name="_backorder_note" id="_backorder_note" value="<?php echo get_post_meta(get_the_ID(), '_backorder_note', true); ?>" />
        </p>
    </div>
<?php } add_action('woocommerce_product_options_stock_status', 'backorder_note_meta');
// Save the field on product save
function save_backorder_note_meta($id, $post){
    update_post_meta($id, '_backorder_note', $_POST['_backorder_note']);
}
add_action( 'woocommerce_process_product_meta', 'save_backorder_note_meta', 10, 2 );
