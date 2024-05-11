@extends('layouts.app')

@section('title', 'Order Food')

@section('content')
<div class="container">
    <h1>Order Food</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <button type="button" class="btn btn-primary btn-block"
                                    onclick="showOrderModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}')">Order</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>Order Summary</h2>
                    <ul class="list-group" id="orderSummary">
                        <!-- Orders will be dynamically added here -->
                    </ul>
                    <strong>Subtotal:</strong> $<span id="subtotal">0.00</span><br>
                    <strong>Tax (10%):</strong> $<span id="tax">0.00</span><br>
                    <strong>Total Price:</strong> $<span id="totalPrice">0.00</span>
                    <!-- Proceed to Payment Button -->
                    <button type="button" class="btn btn-success btn-block" onclick="proceedToPayment()">Proceed to
                        Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="orderForm">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" class="form-control" id="productName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" value="1" min="1">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea class="form-control" id="remarks" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addOrder()">Add Order</button>
            </div>
        </div>
    </div>
</div>

<!-- Order Taken Modal -->
<div class="modal fade" id="orderTakenModal" tabindex="-1" role="dialog" aria-labelledby="orderTakenModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderTakenModalLabel">Order Taken Successfully</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your order has been taken successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showOrderModal(productId, productName, productPrice) {
        $('#productName').val(productName);
        $('#quantity').val(1);
        $('#remarks').val('');
        $('#orderModal').modal('show');
        $('#orderModal').data('productId', productId);
        $('#orderModal').data('productPrice', productPrice);
    }

    var productData = []; // Array to store product data (ID and price)

    function addOrder() {
        var productId = $('#orderModal').data('productId');
        var productName = $('#productName').val();
        var quantity = $('#quantity').val();
        var remarks = $('#remarks').val();
        var price = parseFloat($('#orderModal').data('productPrice'));
        var totalPrice = price * quantity;

        var orderItem = '<li class="list-group-item">' +
            productName + ' - $' + totalPrice.toFixed(2) + ' (' + quantity + ' items)' +
            (remarks ? ' - Remarks: ' + remarks : '') +
            '</li>';

        $('#orderSummary').append(orderItem);

        // Update subtotal, tax, and total price
        var subtotal = parseFloat($('#subtotal').text());
        var tax = parseFloat($('#tax').text());
        subtotal += totalPrice;
        tax = subtotal * 0.1; // Assuming 10% tax
        var total = subtotal + tax;

        $('#subtotal').text(subtotal.toFixed(2));
        $('#tax').text(tax.toFixed(2));
        $('#totalPrice').text(total.toFixed(2));

        $('#orderModal').modal('hide');

        // Add the productId and price to the array
        productData.push([productId, totalPrice]);
    }

    function proceedToPayment() {
        // Show order taken modal
        $('#orderTakenModal').modal('show');

        // Redirect to the payment page after 2 seconds
        var productIdsParam = productData.map(item => item[0]).join(',');
        var productPricesParam = productData.map(item => item[1]).join(',');
        window.location.href = "{{ route('payment') }}?productIds=" + productIdsParam + "&productPrices=" + productPricesParam;
    }

</script>
@endsection