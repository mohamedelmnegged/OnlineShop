@section('title')
    Users
@endsection

@section('headTitle')
    Details
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">User Profile</h4>
                            <p class="category">List of User Details</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                    <tr>
                                        <th>ID</th>
                                        <td>{{$user->id}}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{$user->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td>{{$user->email}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>

                                    <tr>
                                        <th>Address</th>
                                        <td>{{$user->address}}</td>
                                    </tr>

                                    <tr>
                                        <th>Status </th>
                                        <td>
                                            {{$user->status == 1 ? "Active" : "Blocked"}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Created From </th>
                                        <td>{{$user->getDateToRegister()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Last Edit From </th>
                                        <td>{{$user->getDateToEdit()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Action </th>
                                        <td>
                                            <form action="{{route('admin.user.delete')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <input type="submit" value="Delete" class="alert alert-danger"/>
                                            </form>
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

