@section('title')
    Orders
@endsection

@section('headTitle')
    Orders page
@endsection


@section('content')

<div class="content">
    @if(session()->get('msg') != null)
        <div class="alert alert-danger"> {{session()->get('msg')}} </div>
    @endif
    @if(session()->get('sucess') != null)
        <div class="alert alert-success"> {{session()->get('sucess')}} </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Orders</h4>
                        <p class="category">List of all orders</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <a href="{{route('admin.user.details', $order->user->id)}}">
                                                {{$order->user->name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.products.show', $order->product->id)}}">
                                                {{$order->product->name}}
                                            </a>
                                        </td>
                                        <td>{{$order->amount}}</td>
                                        <td>{{$order->user->address}}</td>
                                        <td>
                                            <span class="label label-{{$order->status==1 ? "success":"warning"}}">
                                                {{$order->status==1 ? "Confirmed":"Pending"}}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.orders.edit', $order->id)}}">

                                                <button class="btn btn-sm btn-success ti-close"
                                                        title="Cancel Order">{{$order->status==1 ? "Pending":"Confirmed"}}</button>
                                            </a>
                                            {{-- <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Delete"> Delete</button> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-warning"> No Orders Found </div>
                                @endforelse
                            </tbody>
                        </table>
                            {{$orders->links()}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection

@include('admin.include.main')

