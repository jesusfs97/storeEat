<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"  defer ></script>
    <title>@yield('titulo')</title>

</head>
<body>
    
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials/nav')
        </header>

        <main class="py-4">
            
            
            @if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                    </div>
                </div>
            </div>
                
            @endif


            @yield('contenido')
        </main>

        <footer class=" bg-dark text-center py-3 text-white-50 shadow-md">
            {{ config('app.name' )}} | Copyright @ {{ date('Y')}}
        </footer>
    </div>
</body>
</html>