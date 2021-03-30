@section('title')
    Products
@endsection

@section('headTitle')
    Add Product
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
                            <h4 class="title">Add Product</h4>
                        </div>
                        <div class="content">
                            <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" name="name" class="form-control  border-input "  placeholder="Macbook pro" value="{{old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Price:</label>
                                            <input type="number" name="price" class="form-control border-input" placeholder="$2500" value="{{old('price')}}">
                                            @error('price')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Quantity:</label>
                                            <input type="number" name="quantity" class="form-control border-input" placeholder="1000 item" value="{{old('quantity')}}">
                                            @error('quantity')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea name="description" id="" cols="30" rows="10"
                                                    class="form-control border-input" placeholder="Product Description" >{{old('description')}}</textarea>
                                                @error('description')
                                                    <div class="alert alert-danger">  {{$message}} </div>
                                                @enderror
                                            </div>

                                        <div class="form-group">
                                            <label>Product Image:</label>
                                            <input type="file" name="image" class="form-control border-input">
                                            @error('image')
                                                <div class="alert alert-danger">  {{$message}} </div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
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

