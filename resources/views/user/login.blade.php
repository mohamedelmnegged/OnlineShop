@section('title')
    Login
@endsection

@section('content')

    <div class="container">
        @if(session()->get('msg') != null)
            <div class="alert alert-danger"> {{session()->get('msg')}} </div>
        @endif
        <div class="row">

            <div class="col-md-12" id="register">

                <div class="card col-md-8">
                    <div class="card-body">

                        <h2 class="card-title">Login</h2>
                        <hr>
                        <form action="{{route('user.enter')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" placeholder="Email" id="email" value="{{old('email')}}" class="form-control">
                                @error('email')
                                    <div class='alert alert-danger'> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" placeholder="Password" id="passowrd"
                                    class="form-control">
                                @error('password')
                                    <div class='alert alert-danger'> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-info col-md-2"> Login</button>
                            </div>

                        </form>

                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection

@include('user.include.main')
