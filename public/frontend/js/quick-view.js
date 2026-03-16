
$(document).ready(function() {
    // When a quick view button is clicked
    $('.premium-woo-qv-btn').click(function(e) {
        e.preventDefault();

        // Get the product ID
        var productId = $(this).data('product-id');

        // Show the modal with a loading spinner
        $('#quick-view-modal').addClass('is-visible');
        $('#quick-view-content').html('<div class="loading-spinner"></div>');

        // Make an AJAX request to get the product data
        $.ajax({
            url: '/product/' + productId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the modal with the product data
                var html = `
                    <div class="product">
                        <div class="product-image">
                            <img src="${data.image}" alt="${data.name}">
                        </div>
                        <div class="product-details">
                            <h2>${data.name}</h2>
                            <div class="review-rating">
                                <!-- Add review stars here -->
                            </div>
                            <div class="quantity">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1">
                            </div>
                            <button class="add-to-cart-btn" data-product-id="${data.id}">Add to Cart</button>
                            <div class="category">
                                <strong>Category:</strong> ${data.category}
                            </div>
                        </div>
                    </div>
                `;
                $('#quick-view-content').html(html);
            },
            error: function() {
                // Handle errors
                $('#quick-view-content').html('<p>Error loading product data.</p>');
            }
        });
    });

    // Close the modal
    $('#quick-view-modal .close-btn').click(function() {
        $('#quick-view-modal').removeClass('is-visible');
    });
});
