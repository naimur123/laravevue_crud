<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vue Crud</title>
        <!-- Styles -->
        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('build/assets/app.525f5899.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="app">
                     {{-- <example-component /> --}}
                  <StudentList />

                </div>
            </div>
        </div>
      
        {{-- <script src="{{ asset('build/assets/app.732190a2.js') }}"></script> --}}
    </body>
</html>
