@section('title')
    Home
@endsection

@section('content')

    @if(session('msg') != null)
        <div class="alert alert-success"> {{session('msg')}} </div>
    @endif
    @if(session('error') != null)
        <div class="alert alert-danger"> {{session('error')}} </div>
    @endif
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h5 class="display-3">
                <strong>
                    Welcome,
                    @auth('user')
                        {{auth('user')->user()->name}}
                    @endauth
                </strong></h5>
            <p class="display-4"><strong>SALE UPTO 50%</strong></p>
            <p class="display-4">&nbsp;</p>
            <a href="{{route('user.dashboard')}}" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
        </header>

        <!-- Page Features -->
        <div class="row text-center">
            @forelse($products as $product)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{$product->image['image']}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">
                            {{$product->description}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <strong>${{$product->price}}</strong> &nbsp;
                        <form method="post" action="{{route('user.order.add')}}">
                            <div class="container">
                            @csrf
                            <input type="hidden" name="productId" id="productId"  value="{{$product->id}}">
                            <input type="submit" onclick="sendData()" class="btn btn-primary btn-outline-dark" value="Add To Cart"><i class="fa fa-cart-plus "></i>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @empty
                <div> Sorry, sir there is no Products to shop right now </div>
            @endforelse
        </div>
        <!-- /.row -->

    </div>
@endsection
@section('script')
    {{-- <script>
        function sendData(){
            var _token = $("input[name='_token']").val();
            var productId = document.getElementById('productId').value;
            console.log(productId)
            $.ajax({
                url : "{{route('user.order.add')}}",
                type:"POST",
                data : {_token:_token, id:productId},
                success:function(){
                    console.log('done')
                }
            })
        }
    </script> --}}
@endsection
@include('user.include.main')
