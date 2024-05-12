@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('payment.process') }}">
                        @method('POST')
                        @csrf

                        <input type="hidden" name="productIds" value="{{ json_encode($productIds) }}">
                        <input type="hidden" name="productPrices" value="{{ json_encode($productPrices) }}">

                        <div class="form-group">
                            <label for="payment-method">Payment Method</label>
                            <select class="form-control" id="payment-method" name="payment_method" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>

                        <div id="credit-card-fields" style="display: none;">
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" class="form-control" id="card-number" name="card_number"
                                    placeholder="XXXX-XXXX-XXXX-XXXX">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiration-date">Expiration Date</label>
                                    <input type="text" class="form-control" id="expiration-date" name="expiration_date"
                                        placeholder="MM/YY">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3"
                                        placeholder="CVV">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardholder-name">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardholder-name" name="cardholder_name"
                                    placeholder="Enter cardholder name">
                            </div>
                        </div>

                        <div id="cash-fields" style="display: none;">
                            <div class="form-group">
                                <label for="amount-paid">Amount Paid</label>
                                <input type="text" class="form-control" id="amount-paid" name="amount_paid"
                                    placeholder="Enter amount paid">
                            </div>
                            <div class="form-group">
                                <label for="change">Change</label>
                                <input type="text" class="form-control" id="change" name="change"
                                    placeholder="Enter change">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment-method').addEventListener('change', function () {
        var creditCardFields = document.getElementById('credit-card-fields');
        var cashFields = document.getElementById('cash-fields');

        if (this.value === 'credit_card') {
            creditCardFields.style.display = 'block';
            cashFields.style.display = 'none';
        } else if (this.value === 'cash') {
            creditCardFields.style.display = 'none';
            cashFields.style.display = 'block';
        } else {
            creditCardFields.style.display = 'none';
            cashFields.style.display = 'none';
        }
    });
</script>

@endsection
