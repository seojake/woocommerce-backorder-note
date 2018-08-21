<?php // backorder note for loop
function backorder_note_product_loop(){
    $backorders = get_post_meta(get_the_ID(), '_backorders', true);
    $manage_stock = get_post_meta(get_the_ID(), '_manage_stock', true);
    if($backorders == 'yes' && $manage_stock == 'yes'){ ?>
        <div class="backorder-note">
            <p><?php echo get_post_meta(get_the_ID(), '_backorder_note', true); ?></p>
        </div>
    <?php }
} add_action('woocommerce_after_shop_loop_item', 'backorder_note_product_loop', 5);
// Change button text on loop
function backorder_add_to_cart_text_category(){
    $backorders = get_post_meta(get_the_ID(), '_backorders', true);
    $manage_stock = get_post_meta(get_the_ID(), '_manage_stock', true);
    if($backorders == 'yes' && $manage_stock == 'yes'){
        return '<a href="' . get_permalink( $product->id ) . '" name="add-to-cart" class="button alt">' . __('Preorder') . '</a>';
    } else{
        return '<a href="' . get_permalink( $product->id ) . '" name="add-to-cart" class="button alt">' . __('Add to cart') . '</a>';
    }
} add_action('woocommerce_loop_add_to_cart_link', 'backorder_add_to_cart_text_category');
