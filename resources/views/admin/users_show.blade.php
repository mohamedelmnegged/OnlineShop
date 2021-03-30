@section('title')
    Users
@endsection

@section('headTitle')
    Users
@endsection


@section('content')
    @if(session()->get('msg') != null)
        <div class="alert alert-danger">
            {{session()->get('msg')}}
        </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users</h4>
                            <p class="category">List of all registered users</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>
                                            <span class="label {{$user->status == true? "label-success": "label-danger"}}">
                                            {{$user->status == true? "Active": "Blocked"}}</label>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.users.block', $user->id)}}">
                                                <button class="btn btn-sm btn-success ti-close" title="Block User">
                                                </button>
                                            </a>
                                            <a href="{{route('admin.user.details', $user->id)}}">
                                                <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                        title="Details"></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('admin.include.main')

