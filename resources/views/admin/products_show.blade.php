@section('title')
    Products
@endsection

@section('headTitle')
    Products
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
                            <h4 class="title">All Products</h4>
                            <p class="category">List of all stock</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Desc</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- here to show all the products  --}}
                                @forelse($products as $product)
                                <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>${{$product->price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="{!! $product->image['image'] !!}"  class="img-thumbnail"
                                                style="width:70px"></td>
                                        <td>
                                            <a href="{{route('admin.products.edit', $product->id)}}">
                                                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            </a>
                                            <form action="{{route('admin.products.destroy', $product->id)}} " method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            </form>
                                            <a href="{{route('admin.products.show', $product->id)}}">
                                                <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                            </a>
                                            </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger"> didn't found anything </div>{{"mfasf"}}
                                @endforelse
                                </tbody>
                            </table>

                            {{$products->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('admin.include.main')

