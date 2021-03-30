@section('title')
    Admin
@endsection

@section('headTitle')
    Edit Profile
@endsection

@section('links')
<!-- singup links -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="index.css" rel="stylesheet" type="text/css"/>
@endsection


@section('content')
    <div class="container signup">
        @if(session()->get('msg') != null)
            <div class="alert alert-success"> {{session()->get('msg')}} </div>
        @endif
        <div class="row">
            <div class="col-xs-4"></div>
            <div class="col-xs-4 form">
                <form method="POST" action="{{route('admin.update')}}">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{auth()->id()}}">
                        <input class="form-control" placeholder="Name" type="text" name="name" value="{{auth()->user()->name}}" required="true">
                        @error('name')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        <br>
                        <input class="form-control" placeholder="Email" value="{{auth()->user()->email}}" type="text" name="email">
                        @error('email')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        <br>
                        <input type="hidden" name="oldpassword" value="{{auth()->user()->password}}">
                        <input class="form-control" placeholder="Password" type="password"  name="password">
                        @error('password')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        <br>
                        <input class="form-control" placeholder="Contact" type="text" value="{{auth()->user()->phone}}" name="phone" required="true">
                        @error('phone')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        <br>

                        <button class="btn btn-primary"  type="submit">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('admin.include.main')
