<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @Settings('bassic_settings.lazy_load.status', 'true')
        <div>Tai 1234</div>
        @else
        <div>Tai 3214</div>
        @endSettings

    </body>
</html>
