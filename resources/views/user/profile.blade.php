@section('title')
    Profile
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
                            <h4 class="title">{{auth('user')->user()->name}} profile</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                    <tr>
                                        <th>ID</th>
                                        <td>{{auth('user')->user()->id}}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{auth('user')->user()->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td>{{auth('user')->user()->email}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td>{{auth('user')->user()->phone}}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{auth('user')->user()->getDateToRegister()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{auth('user')->user()->getDateToEdit()}}</td>
                                    </tr>

                                    <tr>
                                        <th> Action </th>
                                        <td>
                                            <a href="{{route('user.edit')}}">
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

@include('user.include.main')

