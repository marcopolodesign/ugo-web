document.addEventListener('DOMContentLoaded', function () {
    // Function to perform AJAX requests
    function ajaxRequest(type, url, data, successCallback) {
        var xhr = new XMLHttpRequest();
        xhr.open(type, url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                successCallback(xhr.responseText);
            }
        };

        xhr.send(data);
    }

    // Ajax request to update cart content
    function updateCart() {
        ajaxRequest('POST', ajax_object.ajax_url, 'action=update_side_cart', function (response) {
            // Update your side cart content here
            document.querySelector('.cart-items').innerHTML = response;
        });
    }

    // Open side cart on trigger button click
    document.querySelector('.side-cart-trigger').addEventListener('click', function () {
        document.querySelector('.side-cart').classList.toggle('open');
        updateCart();
    });

    // Ajax request to add a product to the cart
    document.querySelectorAll('.add-to-cart-button').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var product_id = this.dataset.product_id;

            ajaxRequest('POST', ajax_object.ajax_url, 'action=add_to_cart&product_id=' + product_id, function () {
                // Update side cart on successful product addition
                updateCart();
            });
        });
    });
});