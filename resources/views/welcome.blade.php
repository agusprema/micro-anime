{{-- <php header('Access-Control-Allow-Origin: *'); ?> --}}
{{-- <!DOCTYPE html>
<html>
<head>
    <title>RTMP Embed</title>
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
</head>
    <body>
        <video id="streamContainer" class="video-js vjs-default-skin" controls preload="auto" width="640"
        height="320" data-setup='{ "techorder" : ["flash", "html5"] }'>
        <source src="rtmp://192.168.1.8:1935/live/test" type='rtmp/mp4'>
        </video>

        <video id="example-video" width="640" height="320" class="video-js vjs-default-skin" controls>
            <source
                src="http://192.168.1.8/hls/movie.m3u8"
                type="application/x-mpegURL">
        </video>

        <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-flash@2/dist/videojs-flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>

        <script>
            var player = videojs('example-video');
            player.play();
        </script>
    </body>
</html> --}}

<html>
<head>
    <title>RTMP Embed</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
    <body>

        <div id="app">
            <chart-user-register-component></chart-user-register-component>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
