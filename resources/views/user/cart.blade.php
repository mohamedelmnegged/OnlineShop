@section('title')
    Cart
@endsection


@section('content')

    @if(session('msg') != null)
        <div class="alert alert-success"> {{session('msg')}} </div>
    @endif

    @if(session('error') != null)
        <div class="alert alert-danger"> {{session('error')}} </div>
    @endif

    <!-- Page Content -->
<div class="container">

    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
    <hr>

    <h4 class="mt-5">{{$orders->where('status', '1')->count()}} items(s) in Shopping Cart</h4>

    <div class="cart-items">

        <div class="row">

            <div class="col-md-12">

                <table class="table">

                    <tbody>
                        @forelse($orders as $order)
                        @if($order->status == 1)
                            <tr>
                                <td><img src="{{$order->product->image['image']}}" style="width: 5em"></td>
                                <td>
                                    <strong>{{$order->product->name}}</strong><br> {{$order->product->description}}
                                </td>

                                <td>
                                    <form method="POST" action="{{route('user.order.remove')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <input type="submit"  class="btn btn-sm btn-danger"value="Remove">
                                    </form>
                                    <form method="POST" action="{{route('user.order.savelater')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <input type="submit" class="btn btn-sm btn-info" value="Save For Later">
                                    </form>
                                </td>
                                    @csrf
                                <td>
                                    <input type="number" min="1" name="amount" class="item-num" value="1">
                                </td>

                                <td class="price-container">
                                    <span>$</span><span class="price cart-item-price">{{$order->product->price}}</span>
                                </td>
                            </tr>
                        @endif
                        @empty
                            <div> there is no items in Cart
                        @endforelse
                    </tbody>

                </table>

            </div>
            <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Price Details</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>Subtotal </td>
                                    <td id="subtotal">0</td>
                                </tr>
                                <tr>
                                    <td>Text</td>
                                    <td id="tax">1000</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th id="total">0</th>
                                </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <button class="btn btn-outline-dark"><a href="{{route('user.dashboard')}}"> Continue Shopping </a> </button>
                    <button class="btn btn-outline-info" onclick="proceed()"> <a href="{{route('user.checkout.index')}}"> Proceed to checkout </a> </button>
                <hr>

                </div>

                <div class="col-md-12">

                <h4> {{$orders->where('status', '0')->count()}}  items Save for Later</h4>
                <table class="table">

                    <tbody>
                        @forelse($orders as $order)
                            @if($order->status == 0)
                                <tr>
                                    <td><img src="{{$order->product->image['image']}}" style="width: 5em"></td>
                                    <td>
                                        <strong>{{$order->product->name}}</strong><br>{{$order->product->description}}
                                    </td>

                                    <td>
                                        <form method="POST" action="{{route('user.order.remove')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            <input type="submit"  class="btn btn-sm btn-danger"value="Remove">
                                        </form>
                                        <form method="POST" action="{{route('user.order.buy')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            <input type="submit" class="btn btn-sm btn-info" value="Return to Buy">
                                        </form>

                                    </td>


                                    <td class="price-container">
                                        <span>$</span><span class="price">{{$order->product->price}}</span>
                                    </td>
                                </tr>
                            @endif
                        @empty

                            <div> there is no items for save later </div>
                        @endforelse
                    </tbody>

                </table>

            </div>
                </div>


            </div>
        </div>
<!-- /.container -->

@endsection

@section('script')
<script>
    window.addEventListener("load", function(){
        calcTotalAndSubtotla();
    });
    let inputs = document.querySelectorAll(".item-num");
    function calcTotalAndSubtotla(){
        let cartItemPrices = Array.from(document.querySelectorAll(".cart-item-price"));
        let subTotal = document.querySelector("#subtotal");
        let subTotalValue = parseInt(subTotal.innerHTML);
        let total = document.querySelector("#total");
        let totalValue = parseInt(subTotal.innerHTML);
        let tax = document.querySelector("#tax");
        let taxValue = parseInt(tax.innerHTML);
        subTotalValue = 0;
        totalValue = 0;
        //console.log(cartItemPrices);
        for(cartItemPrice in cartItemPrices){
            subTotalValue += parseInt(cartItemPrices[cartItemPrice].innerHTML);
            subTotal.innerHTML = subTotalValue;
            totalValue = subTotalValue + taxValue;
            total.innerHTML = totalValue;
        }
       // console.log(cartItemPrice)
    }
    let amounts = Array()

    function getprice(){
        let prices = Array();
        for (let i = 0; i < inputs.length; i++) {
        let priceContainer = inputs[i].parentElement.parentElement.querySelector(".price-container").querySelector(".price");
        let price = priceContainer.innerHTML;
        inputs[i].addEventListener('change', function(){
            priceContainer.innerHTML = price * inputs[i].value;
            calcTotalAndSubtotla();
            getprice()
        })
        prices.push(inputs[i].value)
    }
        amounts = prices // here to get the number of items count
    }
    getprice()

    function proceed(){
            var _token = $("input[name='_token']").val();
            $.ajax({
                url : "{{route('user.order.update')}}",
                type:"POST",
                data : {_token:_token, amounts:amounts},
                success:function(data){
                    console.log(data)
                }
            })
    }



    </script>

    <script>

        // let amounts = Array();
        // function getPrice(){
        //     let inputs = document.querySelectorAll(".item-num");
        //     let prices = Array();
        //     for (let i = 0; i < inputs.length; i++) {
        //         let priceContainer = inputs[i].parentElement.parentElement.querySelector(".price-container").querySelector(".price");
        //         let price = priceContainer.innerHTML;
        //         inputs[i].addEventListener('change', function(){
        //             priceContainer.innerHTML = price * inputs[i].value;
        //             // inputs[i].value
        //             getPrice();
        //         })
        //         prices.push( inputs[i].value)
        //     }
        //     amounts = prices;
        // }
        // getPrice();
        // here to update the amount in the database


    </script>
@endsection
@include('user.include.main')
