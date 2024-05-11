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

                 

                    <form method="POST" action="{{ route('payment.process') }}">
                        @method('POST')
                        @csrf

                        <input type="hidden" name="productIds" value="{{ json_encode($productIds) }}">
                        <input type="hidden" name="productPrices" value="{{ json_encode($productPrices) }}">

                        <div class="form-group">
                            <label for="card-number">Card Number</label>
                            <input type="text" class="form-control" id="card-number" name="card_number"
                                placeholder="XXXX-XXXX-XXXX-XXXX" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="expiration-date">Expiration Date</label>
                                <input type="text" class="form-control" id="expiration-date" name="expiration_date"
                                    placeholder="MM/YY" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3"
                                    placeholder="CVV" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardholder-name">Cardholder Name</label>
                            <input type="text" class="form-control" id="cardholder-name" name="cardholder_name"
                                placeholder="Enter cardholder name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection