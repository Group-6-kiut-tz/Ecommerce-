@extends('app')
@section('content')
    <!-- ... your existing code ... -->
    <h2 class="text-center">Payment</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Payment Details</h3>
            <form action="{{ route('finalPayment') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="paymentMethod" class="form-label">Payment Method</label>
                    <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                        <option value="MPESA">MPESA</option>
                        <option value="TIGOPES">TIGOPESA</option>
                        <option value="AIRTEL MONEY">AIRTEL MONEY</option>
                        <option value="NMB">NMB</option>
                        <option value="CRDB">CRDB</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNo" name="PhoneNo"  placeholder="0xxxxxxxxx"required>
                </div>
                <div class="mb-3">
                    <label for="TotalPrice" class="form-label">TotalPrice</label>
                    <input type="text" class="form-control" id="TotalPrice" name="TotalPrice" value="{{$totalprice }}" required>
                </div>
                
                <form action="{{ route('finalPayment') }}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-primary">CompletePayment</button>
            </form>
        </div>
    </div>
@endsection
