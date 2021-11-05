<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('pgtitle') - SIAC </title>

    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- To form tokens -->
    <meta name="routeName" content="{{ Route::currentRouteName() }}">

    <!-- Style resources -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/admin.css') }}">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome icons kit -->
    <script src="https://kit.fontawesome.com/05e396472b.js" crossorigin="anonymous"></script>

    <!-- JQuery library CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <div class="wrapper">
        <div class="col1"> @include('admin.sidebar') </div>
        
        <!-- Section to put the selected section content -->
        <div class="col2">

            <!-- Code block to show form validation errors to users on screen -->
            @if (Session::has('message'))
                <div class="container">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function(){ $('.alert').slideUp; }, 10000);
                        </script>
                    </div>
                </div>
            @endif

            <div class="page">
                <div class="container-fluid">

                    <!-- Will be filled with selected section (menu) data & options -->
                    @section('content')
                    @show

                </div>
            </div>

        </div>
    </div>
    
</body>
</html>