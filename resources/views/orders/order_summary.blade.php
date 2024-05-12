<!-- Order summary -->
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
