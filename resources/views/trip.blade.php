<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trip Builder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div>
                    <p>{{Session::get('message')}}</p>
                </div>
                <div class="title m-b-md">
                    TRIP {{ $trip->reservation_code }}
                </div>

                <div>
                    <p><b>FLIGHTS LIST</b></p>
                </div>

                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Departure airport </th>
                                <th>Departure city</th>
                                <th>Arrival airport</th>
                                <th>Arrival city</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <td>{{ $flight->depart_airport->code }}</td>
                                    <td>{{ $flight->depart_airport->city }}</td>
                                    <td>{{ $flight->dest_airport->code }}</td>
                                    <td>{{ $flight->dest_airport->city }}</td>
                                    {{ Form::open(array('action' => 'TripController@deleteFlight', 'method' => 'POST' )) }}
                                    {{ Form::hidden('id', $trip->id) }}
                                    {{ Form::hidden('depart_airport', $flight->depart_airport->code) }}
                                    {{ Form::hidden('dest_airport', $flight->dest_airport->code) }}
                                    <td>{{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}</td>
                                    {{ Form::close() }}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <p><b>ADD NEW FLIGHT TO THE TRIP</b></p>
                </div>
                <div>
                    <table class="table table-striped">
                        <tr>
                            {{ Form::open(array('action' => 'TripController@addFlight', 'method' => 'POST' )) }}
                            {{ Form::hidden('id', $trip->id) }}
                            <td>{{ Form::label('depart_airport', 'Departure Airport') }}</td>
                            <td>{{ Form::text('depart_airport', 'depart airport') }}</td>
                            <td>{{ Form::label('dest_airport', 'Arrival Airport') }}</td>
                            <td>{{ Form::text('dest_airport', 'Arrival Airport') }}</td>
                            <td>{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}</td>
                            {{ Form::close() }}
                        </tr>
                    </table>

                </div>

            </div>
        </div>
    </body>
</html>