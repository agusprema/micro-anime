@extends('layouts.home')
@section('title', ucwords(str_replace('-', ' ', $episode->episode ?? 'Anime Not Found')).' | ')
@section('content')
<!-- post -->
@if ($episode && $anime)
<div class="ads_anime pt-2">
    @foreach (\DB::table('ads_banners')->where('type_for', 'anime')->orderBy('id', 'desc')->limit(1)->get() as $ads_anime)
    <a target="_blank" href="{{ $ads_anime->url }}" title="{{ $ads_anime->title }}">
        <img style="max-height:90px;" class="w-100 mb-2" src="{{ $ads_anime->image }}" alt="{{ $ads_anime->title }}" title="{{ $ads_anime->title }}">
    </a>
    @endforeach
</div>

<div data-src="{{ $episode->video }}" class="player mb-2" id="player">
    @if ($anime->background_anime)
    <img style="max-height: 450px" class="img-fluid" src="{{ $anime->background_anime }}" alt="{{ $anime->title_anime }}" title="{{ $anime->title_anime }}" />
    @else
    <img style="max-height: 450px" class="img-fluid" src="{{ asset('img/no-image-available.jpg') }}" alt="{{ $anime->title_anime }}" title="{{ $anime->title_anime }}" />
    @endif
    <span></span>
</div>

@foreach (\DB::table('ads_banners')->where('type_for', 'anime')->orderBy('id', 'desc')->limit(1)->get() as $ads_anime)
<a target="_blank" href="{{ $ads_anime->url }}" title="{{ $ads_anime->title }}">
    <img style="max-height:90px;" class="w-100 mb-2" src="{{ $ads_anime->image }}" alt="{{ $ads_anime->title }}" title="{{ $ads_anime->title }}">
</a>
@endforeach

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center pt-1 pb-2">
        <li class="page-item @if (!$episode->prev)disabled @endif">
            <a rel="prev" class="page-link" href="@if ($episode->prev) {{ url('/') . '/' . strtolower($episode->prev) }} @endif" @if (!$episode->prev) tabindex="-1" aria-disabled="true" @endif>Previous</i></a>
        </li>

        <li class="page-item"><a class="page-link" href="{{ url('/anime') . '/' . strtolower($episode->id_anime) }}">Semua Episode</a></li>

        <li class="page-item @if (!$episode->next)disabled @endif">
            <a rel="prev" class="page-link" href="@if ($episode->next) {{ url('/') . '/' . strtolower($episode->next) }} @endif" @if (!$episode->next) tabindex="-1" aria-disabled="true" @endif>Next</i></a>
        </li>
    </ul>
</nav>

<div class="col-md-3 box-detail float-left p-0 pr-2">

    <div class="image-detail mb-2">
        <img src="{{ $anime->image_anime }}" alt="{{ $anime->title_anime }}" title="{{ $anime->title_anime }}" >
    </div>

    <div class="content-detail text-white mb-2">
        <ul>
            <li><b>Alternative</b> : {{ $anime->alternative_title }}</li>
            <li><b>Rating</b> : {{ $anime->rating_anime }}</li>
            <li><b>Votes</b> : {{ $anime->vote_anime }}</li>
            <li><b>Status</b> : {{ $anime->status_anime }}</li>
            <li><b>Type</b> : {{ $anime->type_anime }}</li>
            <li><b>Total Episode</b> : {{ $anime->total_anime }}</li>
            <li class="genre-detail"><b>Genres</b><span class="text-white"> : </span>
                @foreach (explode(",", $anime->genre_anime) as $genre)
                <a class="text-secondary" href="{{ url('archive/genre/') . '/' . strtolower(str_replace(",", "", $genre)) }}">{{ $genre }}</a>,
                @endforeach
            </li>
        </ul>
    </div>
    <div id="share" style="font-size: 12px;"></div>
</div>

<div class="col-md-9 float-left p-0 pl-2 text-white box-tse">
    <div class="title-detail mb-2 pb-1 font-weight-bold">{{ $anime->title_anime }}</div>
    <div class="summary-detail text-justify mb-3">
    {{ $anime->summary_anime }}
    </div>

    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://micro-anime.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
@else
@include('partials.errors_anime')
@endif
<div class="clearfix"></div>
@endsection
