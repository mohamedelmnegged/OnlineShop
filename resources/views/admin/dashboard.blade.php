@section('title')
    Dashboard
@endsection

@section('headTitle')
    Dashboard
@endsection


@section('content')

    @if(session('success') != null)
        <div class="alert alert-success"> {{session('success')}} </div>
    @endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-eye"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Total Visitors</p>
                                        11022
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-panel"></i> Details
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.products.index')}}">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Products</p>
                                            {{$products}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.orders.index')}}">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Orders</p>
                                            {{$orders}}
                                        </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-panel"></i> Details
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                </a>
                <a href="{{route('admin.users.show')}}">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Users</p>
                                            {{$users}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@include('admin.include.main')

