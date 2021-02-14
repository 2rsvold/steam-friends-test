<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Steam Friends - Gamer.no</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Steam Friends for Gamer.no</h1>

            @if(Session::has('user'))
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ Session::get('user.avatar') }}" alt="{{ Session::get('user.name') }}">
                        </div>
                        <div class="col-10">
                            <h3>Hello, {{ Session::get('user.name') }}!</h3>
                            <p>
                                You can now view your friends below.
                            </p>
                            <p>
                                <a class="btn btn-danger btn-sm" href="/logout">Logout</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @each('friend', $friends, 'friend')
                </div>
            @else
                <p>
                    <a class="btn btn-sm btn-success" href="/login">Login to view your friends</a>
                </p>
            @endif
        </div>
    </body>
</html>
