<div class="box-chat-sidebar pt-1">
    <div class="title-widget"><i class="fas fa-history text-primary pr-1"></i><span>History</span></div>

    <div class="history">
        <ul wire:poll.10000ms>
            @if ($count !== 0)
            @foreach ( $historys as $history)
            <li><a title="{{ ucwords(str_replace('-', ' ', $history->id_episode ?? 'Anime Not Found')) }}" href="{{ url(strtolower($history->id_episode)) }}">{{ ucwords(str_replace('-', ' ', $history->id_episode ?? 'Anime Not Found')) }}</a></li>
            @endforeach
            @else
            <li>History Anime Not Found</li>
            @endif
        </ul>
    </div>
</div>

