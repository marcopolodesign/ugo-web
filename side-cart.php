<div class="side-cart fixed min-h-[100vw] w-1/3 top-0 right-0 bg-white text-black z-50 translate-x-full group [&.open]:translate-x-0 smooth-t">
    <div class="cart-content">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <?php
            // WooCommerce functions to display cart items
            woocommerce_mini_cart();
            ?>
        </div>
        <div class="cart-total">
            <?php
            // WooCommerce function to display cart total
            echo WC()->cart->get_cart_total();
            ?>
        </div>
    </div>
</div>