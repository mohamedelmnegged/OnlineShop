@section('title')
    Edit
@endsection

@section('content')

<div class="container">
    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}} </div>
    @endif
    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Edit {{auth('user')->user()->name}} Profile</h2>
                    <hr>
                    <form method="post" action="{{route('user.update')}}" >
                        @csrf

                        <input type="hidden" name="id" value="{{auth('user')->id()}}">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Name" id="name" value="{{auth('user')->user()->name}}" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" value="{{auth('user')->user()->email}}" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" placeholder="Phone" id="phone" value="{{auth('user')->user()->phone}}" class="form-control">
                            @error('phone')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="check" value="true">
                            <input type="hidden" name="oldpassword" value="{{auth('user')->user()->password}}">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password"  class="form-control">
                            @error('password')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="confirmpassword" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" placeholder="Address" value="{{auth('user')->user()->address}}" id="address" class="form-control">
                            @error('address')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="btn btn-outline-info col-md-2" type="submit" value="update">
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@include('user.include.main')
