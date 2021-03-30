@section('title')
    Products
@endsection

@section('headTitle')
    Product Details
@endsection


@section('content')
    @if(session()->get('sucess') != null)
        <div class="alert alert-success"> {{session()->get('sucess')}} </div>
    @endif
    @if(session()->get('msg'))
        <div class="alert alert-danger"> {{session()->get('msg')}} </div>
    @endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Product Detail</h4>
                            <p class="category">List of all stock</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                    <tr>
                                        <th>ID</th>
                                        <td>{{$product->id}}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{$product->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td>{{$product->description}}</td>
                                    </tr>

                                    <tr>
                                        <th>Price</th>
                                        <td>${{$product->price}}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{$product->getDateToRegister()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{$product->getDateToEdit()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Image</th>
                                        <td><img src="{{$product->image['image']}}" alt="" class="img-thumbnail" style="width: 150px;"></td>
                                    </tr>
                                    <tr>
                                        <th> Action </th>
                                        <td> <a href="{{route('admin.products.edit', $product->id)}}">
                                                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit">  Edit </button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.include.main')

