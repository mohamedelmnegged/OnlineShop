@section('title')
    Admin
@endsection

@section('headTitle')
    {{auth('admin')->user()->name}} Details
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
                                        <td>{{auth('admin')->user()->id}}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{auth('admin')->user()->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td>{{auth('admin')->user()->email}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td>{{auth('admin')->user()->phone}}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{auth('admin')->user()->getDateToRegister()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{auth('admin')->user()->getDateToEdit()}}</td>
                                    </tr>

                                    <tr>
                                        <th> Action </th>
                                        <td> <a href="{{route('admin.edit', auth('admin')->id())}}">
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

