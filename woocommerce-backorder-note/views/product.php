<?php // backorder note for product single
function backorder_note_product_single(){
    $backorders = get_post_meta(get_the_ID(), '_backorders', true);
    $manage_stock = get_post_meta(get_the_ID(), '_manage_stock', true);
    if($backorders == 'yes' && $manage_stock == 'yes'){ ?>
        <div class="backorder-note">
            <p><?php echo get_post_meta(get_the_ID(), '_backorder_note', true); ?></p>
        </div>
    <?php }
} add_action('woocommerce_single_product_summary', 'backorder_note_product_single', 29);
// Change button text on product single
function backorder_add_to_cart_text_product(){
    $backorders = get_post_meta(get_the_ID(), '_backorders', true);
    $manage_stock = get_post_meta(get_the_ID(), '_manage_stock', true);
    if(is_product() && $backorders == 'yes' && $manage_stock == 'yes'){
        echo 'Preorder';
    } else{
        echo 'Add to basket';
    }
} add_action('woocommerce_product_single_add_to_cart_text', 'backorder_add_to_cart_text_product');
