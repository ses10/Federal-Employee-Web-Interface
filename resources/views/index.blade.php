<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
  
    <link href="{{ asset('css/vendor/bootstrap.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ asset('css/vendor/bootstrap-theme.css') }}" rel="stylesheet" type="text/css">  

    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Federal Employee Database</a>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/departments') }}">All Departments</a></li>
                    <li><a href="#">Add Employee</a></li>
                </ul>
            </nav>


            @yield('content')

        </div>
    </body>
</html>
