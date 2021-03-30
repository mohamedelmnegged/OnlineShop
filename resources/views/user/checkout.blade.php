@section('title')
    Cart
@endsection


@section('content')

    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}} </div>
    @endif
        <!-- Page Content -->
    <div class="container">

        <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Checkout</h2>
        <hr>


            <div class="row">

            <div class="col-md-7">
                <h4>Billing Details</h4>

                <form method="post" action="{{route('user.checkout.add')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth('user')->id()}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address" placeholder="1234 Main St">
                        @error('address')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}" id="city" placeholder="City">
                        @error('city')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        </div>
                        <div class="form-group col-md-4">
                        <label for="provance">Provance</label>
                            <input type="text" class="form-control" name="provance" value="{{old('provance')}}" id="provance" placeholder="Provance">
                            @error('provance')
                                <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                        <label for="postal">Postal</label>
                        <input type="text" class="form-control" name="postal" value="{{old('postal')}}" id="postal" placeholder="Postal">
                        @error('postal')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" id="phone" placeholder="Phone">
                        @error('phone')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <hr>
                    <h5><i class="fa fa-credit-card"></i> Payment Details</h5>

                    <div class="form-group">
                        <label for="name_card">Name on card</label>
                        <input type="text" class="form-control" name="nameOnCard" value="{{old('nameOnCard')}}" id="name_card" placeholder="Name on card">
                        @error('nameOnCard')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="card">Credit or debit card</label>
                        <input type="text" class="form-control"name="credit" value="{{old('credit')}}" id="card" placeholder="Credit or debit card">
                        @error('credit')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-outline-info col-md-12" value="Complete Order">
                    </form>

                </div>

                <div class="col-md-5">

                <h4>Your Order</h4>

                    <table class="table your-order-table">
                        <tr>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Qty</th>
                        </tr>
                        @forelse($orders as $order)
                            <tr>
                                <td><img src="{{$order->product->image['image']}}" alt="" style="width: 4em"></td>
                                <td>
                                    <strong>{{$order->product->name}}</strong><br>
                                    {{$order->product->description}} <br>
                                    <span class="text-dark">${{$order->product->price}}</span>
                                </td>
                                <td>
                                    <span class="badge badge-light">{{$order->amount}}</span>
                                </td>
                            </tr>
                        @empty
                            <div> there is no items to buy </div>
                        @endforelse
                    </table>

                    <hr>
                    <table class="table your-order-table table-bordered">
                        <tr>
                            <th colspan="2" ">Price Details</th>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>${{$subPrice}}</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>${{$tax}}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>${{$subPrice + $tax}}</th>
                        </tr>

                    </table>

                </div>
            </div>

    </div>
    <!-- /.container -->

    <div class="mt-5"><hr></div>
@endsection

@include('user.include.main')
