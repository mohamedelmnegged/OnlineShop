@section('title')
    SignUp
@endsection

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>
                    <hr>
                    <form action="{{route('user.create')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Name" id="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" value="{{old('email')}}" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" placeholder="Phone" id="phone" value="{{old('phone')}}" class="form-control">
                            @error('phone')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
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
                            <input type="text" name="address" placeholder="Address" value="{{old('address')}}" id="address" class="form-control">
                            @error('address')
                                <div class="alert alert-danger">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@include('user.include.main')
