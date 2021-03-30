@section('title')
    Products
@endsection

@section('headTitle')
    Edit Product
@endsection


@section('content')
    @if(session()->get('sucess') != null)
        <div class="alert alert-success"> {{session()->get('sucess')}} </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Product</h4>
                        </div>
                        <div class="content">
                            <form method="POST" action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" name="name" class="form-control  border-input "  placeholder="Macbook pro" value="{{$product->name}}">
                                            @error('name')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Price:</label>
                                            <input type="number" name="price" class="form-control border-input" placeholder="$2500" value="{{$product->price}}">
                                            @error('price')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Quantity:</label>
                                            <input type="number" name="quantity" class="form-control border-input" placeholder="1000 item" value="{{$product->quantity}}">
                                            @error('quantity')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea name="description" id="" cols="30" rows="10"
                                                    class="form-control border-input" placeholder="Product Description" >{{$product->description}}</textarea>
                                                @error('description')
                                                    <div class="alert alert-danger">  {{$message}} </div>
                                                @enderror
                                            </div>

                                        <div class="form-group">
                                            <label>Product Image:</label>
                                            <input type="file" name="image" class="form-control border-input" >
                                            <input type="hidden" name="oldImage" value="{{$product->image['name']}}"> {{-- to set old image in  --}}
                                            <img src=" {!! $product->image['image'] !!} "class="img-thumbnail"
                                            style="width:70px" >
                                            @error('image')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Edit Product</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.include.main')

