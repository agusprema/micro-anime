@foreach ($bookmarks as $bookmark)
<div class="col-md-2-a p-1 remove box-post float-left {{ $bookmark->id_anime }}">
    <div class="btn-close d-none" id="btn-close" wire:click="deleteTodo({{ $bookmark->id_anime }})">Delete X</div>
    <a href="{{ url('anime', $bookmark->id_anime) }}" title="{{ $bookmark->title_anime }}">
        <img src="{{ $bookmark->image_anime }}" title="{{ $bookmark->title_anime }}">
        <div class="title-post">{{ $bookmark->title_anime }}</div>
    </a>

    @if ($bookmark->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

    @php $episode = \DB::table('episode_animes')->where('id_anime', $bookmark->id_anime)->count(); @endphp
    <div class="label-episode-right text-white">Episode {{ $episode }}</div>

    <div class="label-box">
        {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($bookmark->id_anime) !!}
        {!! App\Helpers\AnimeLabelHelper::instance()->label_new($bookmark->id_anime) !!}
    </div>
</div>
@endforeach
