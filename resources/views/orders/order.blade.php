@extends('layouts.app') 

@section('title', 'Order Food')

@section('content')
<style>
        h1{
            
            color: rgba(113,99,186,255);
            
        }
    
        .container{
            margin-left:8%;
            margin-top:5%;
        }
        .main--content {
            position: relative;
            background: #ebe9e9;
            width: 100%;
            padding: 1rem;
        }
        .header--wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background: #fff;
            border-radius: 10px;
            padding: 10px 2rem;
            margin-bottom: 1rem;
        }

        .header--title {
            color: rgba(113,99,186,255);
        }
        .custom-button {
        display: inline-block;
        padding: 10px 130px;
        margin-bottom:10px;
        background-color: rgba(113, 99, 186, 255);
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        .custom-button--orderList {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom:10px;
        background-color: rgba(113, 99, 186, 255);
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        .custom-button--addOrder {
        display: inline-block;
        padding: 7px 15px;
        background-color: rgba(113, 99, 186, 255);
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        .custom-button:hover {
        background-color: rgba(93, 79, 166, 255);
        color: #fff;
        text-decoration: none;
    }
        /* card container */
        .card--container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
        }

        .card--wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .main--title {
            color: rgba(113,99,186,255);
            padding-bottom: 10px;
            font-size: 15px;
        }

        .product--card {
            background: rgb(229,223,223);
            border-radius: 10px;
            padding: 1.2rem;
            width: 290px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.5s ease-in-out;
        }

            .product--card:hover {
                transform: translateY(-5px);
            }

        .card--header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .amount {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 12px;
            font-weight: 200;
        }

        .card--text {
            font-size: 24px;
            font-family: Courier New, Courier, monospace;
            font-weight: 600;
        }

        /* color css */
        .light-red {
            background: rgb(251,233,233);
        }

        .light-purple {
            background: rgb(254,226,254);
        }

        .light-green {
            background: rgb(235,254,235);
        }

        .light-blue {
            background: rgb(236,236,254);
        }

    </style>
    
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
                                <button type="button" class="custom-button"
                                    onclick="showOrderModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}')">Order</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
        <div class="col-md-4">
        <!-- this is using the Template Method (design pattern)-->
            @include('orders.order_summary') 
        </div>
    </div>
    <form method="get" action="{{ route('orders.index') }}">
            @csrf
            <button type="submit" name="view_orders" class="custom-button--orderList">View Order List</button>
        </form>
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
                <button type="button" class="custom-button--addOrder" onclick="addOrder()">Add Order</button>
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
                <button type="button" class="btn btn-primary" id="proceedToPaymentBtn">OK</button>
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
            '<button type="button" class="btn btn-sm btn-danger float-right" onclick="removeOrder(' + $('#orderSummary li').length + ')">Remove</button>' +
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
        
        // Check if order summary is empty
        if ($('#orderSummary li').length === 0) {
        // Show an alert message using JavaScript
        alert('Please add items to your order before proceeding to payment.');
        return; // Stop further execution
    }

    // Show order taken modal
    $('#orderTakenModal').modal('show');

   
    setTimeout(function() {
        var productIdsParam = productData.map(item => item[0]).join(',');
        var productPricesParam = productData.map(item => item[1]).join(',');
        window.location.href = "{{ route('payment') }}?productIds=" + productIdsParam + "&productPrices=" + productPricesParam;
    }, 2000); // 2000 milliseconds = 2 seconds

    }

    function removeOrder(index) {
        // Remove the order item from the array
        productData.splice(index, 1);

        // Remove the order item from the order summary
        $('#orderSummary li').eq(index).remove();

        // Update the index of the remaining items in the array
        $('#orderSummary li').each(function(i) {
            $(this).find('.btn-danger').attr('onclick', 'removeOrder(' + i + ')');
        });

        // Recalculate subtotal, tax, and total price
        recalculatePrices();
    }

    function recalculatePrices() {
        var subtotal = 0;
        $('#orderSummary li').each(function () {
            var totalPrice = parseFloat($(this).text().split('$')[1].split(' ')[0]);
            subtotal += totalPrice;
        });

        var tax = subtotal * 0.1; // Assuming 10% tax
        var total = subtotal + tax;

        $('#subtotal').text(subtotal.toFixed(2));
        $('#tax').text(tax.toFixed(2));
        $('#totalPrice').text(total.toFixed(2));
    }
    
</script>
@endsection