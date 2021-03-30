<!DOCTYPE html>
<head>
    <head>
        @include('admin.include.head')
    </head>
    <body>
        <div class="wrapper">
            @include('admin.include.sidebar')
            <div class="main-panel">
                @include('admin.include.navbar')
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>

                            <li>
                                <a href="">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        , made with <i class="fa fa-heart heart"></i> by <a href="https://www.linkedin.com/in/mohamedelmnegged">Mohame Elmnegged</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
    @include('admin.include.footer')
</html>
