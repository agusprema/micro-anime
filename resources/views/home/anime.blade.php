@extends('layouts.home')
@section('title', $anime->title_anime ?? 'Anime Not Found'.' | ')
@section('content')
<!-- post -->
@if ($anime)
<div class="ads_anime pt-2">
    @foreach (\DB::table('ads_banners')->where('type_for', 'anime')->orderBy('id', 'desc')->limit(1)->get() as $ads_anime)
    <a target="_blank" href="{{ $ads_anime->url }}" title="{{ $ads_anime->title }}">
        <img style="max-height:90px;" class="w-100" src="{{ $ads_anime->image }}" alt="{{ $ads_anime->title }}" title="{{ $ads_anime->title }}">
    </a>
    @endforeach
</div>

<div class="title-widget mb-1"><i style="color: #ffc107;" class="fas fa-info-circle pr-1"></i><span class="text-white">Detail Anime</span></div>

<div class="col-md-3 box-detail float-left p-0 pr-2">

    <div class="image-detail mb-2">
        <img src="{{ $anime->image_anime }}" alt="{{ $anime->title_anime }}" title="{{ $anime->title_anime }}">
    </div>

    <div class="content-detail text-white mb-2">
        <ul>
            <li><b>Alternative</b> : {{ $anime->alternative_title }}</li>
            <li><b>Rating</b> : {{ $anime->rating_anime }}</li>
            <li><b>Votes</b> : {!! App\Helpers\AnimeLabelHelper::instance()->count_list_anime($anime->id_anime) !!}</li>
            <li><b>Status</b> : {{ $anime->status_anime }}</li>
            <li><b>Type</b> : {{ $anime->type_anime }}</li>
            <li><b>Total Episode</b> : @if ($anime->total_anime){{$anime->total_anime}}@else{{__('Unknown')}}@endif</li>
            <li class="genre-detail"><b>Genres</b><span class="text-white"> : </span>
                @foreach (explode(",", $anime->genre_anime) as $genre)
                <a class="text-secondary" href="{{ url('archive/genre/') . '/' . strtolower(str_replace(",", "", $genre)) }}">{{ $genre }}</a>,
                @endforeach
            </li>
        </ul>
    </div>
</div>

<div class="col-md-9 float-left p-0 pl-2 text-white box-tse">

    <div class="title-detail mb-2 pb-1 font-weight-bold">{{ $anime->title_anime }}</div>
    <div class="summary-detail text-justify mb-1">
        {{ $anime->summary_anime }}
    </div>

    <div class="mb-2">
        <div id="share" class="float-left" style="font-size: 12px;"></div>
        <div class="ar-list jssocials-share {{ $action[0] }}" data-anim="{{ $anime->id_anime }}" title="{{ $action[1] }}"></div>
        <div class="clearfix"></div>
    </div>

    <div class="title-widget-detail">
        <span class="float-left">Episode</span>
        <span class="float-right">Download</span>
    </div>

    <div class="episode-detail mb-3">
        <ul class="mCustomScrollbar" data-mcs-theme="minimal-dark">
            @if ($episodes)
            @foreach ($episodes as $episode)
            <li>
                <a class="float-left" href="{{ url('/') . '/' . strtolower(str_replace(" ", "-", $episode->episode)) }}">{{ str_replace("-", " ", str_replace(''.$episode->id_anime.'', "", $episode->episode)) }}</a>

                @if ($episode->download)
                <a class="float-right" href="<?= $episode['download'] ?>">Download</a>
                @else
                <span class="float-right">Not Available</span>
                @endif
            </li>
            @endforeach
            @else
            <li><span>Sabar bos episode sedang di upload 😁</span></li>
            @endif
        </ul>
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
