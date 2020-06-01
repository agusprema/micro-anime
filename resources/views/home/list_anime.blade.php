@extends('layouts.home')
@section('title', 'List Anime | ')
@section('content')
<!-- post -->
<div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-list-ul pr-1"></i><span class="text-white">List Anime</span></div>

<div class="box-list-id-anime text-center mb-1">
    <a class="btn btn-primary page-scroll" href="##" >#</a>
    <a class="btn btn-primary page-scroll" href="#A" >A</a>
    <a class="btn btn-primary page-scroll" href="#B" >B</a>
    <a class="btn btn-primary page-scroll" href="#C" >C</a>
    <a class="btn btn-primary page-scroll" href="#D" >D</a>
    <a class="btn btn-primary page-scroll" href="#E" >E</a>
    <a class="btn btn-primary page-scroll" href="#F" >F</a>
    <a class="btn btn-primary page-scroll" href="#G" >G</a>
    <a class="btn btn-primary page-scroll" href="#H" >H</a>
    <a class="btn btn-primary page-scroll" href="#I" >I</a>
    <a class="btn btn-primary page-scroll" href="#J" >J</a>
    <a class="btn btn-primary page-scroll" href="#K" >K</a>
    <a class="btn btn-primary page-scroll" href="#L" >L</a>
    <a class="btn btn-primary page-scroll" href="#M" >M</a>
    <a class="btn btn-primary page-scroll" href="#N" >N</a>
    <a class="btn btn-primary page-scroll" href="#O" >O</a>
    <a class="btn btn-primary page-scroll" href="#P" >P</a>
    <a class="btn btn-primary page-scroll" href="#Q" >Q</a>
    <a class="btn btn-primary page-scroll" href="#R" >R</a>
    <a class="btn btn-primary page-scroll" href="#S" >S</a>
    <a class="btn btn-primary page-scroll" href="#T" >T</a>
    <a class="btn btn-primary page-scroll" href="#U" >U</a>
    <a class="btn btn-primary page-scroll" href="#V" >V</a>
    <a class="btn btn-primary page-scroll" href="#W" >W</a>
    <a class="btn btn-primary page-scroll" href="#X" >X</a>
    <a class="btn btn-primary page-scroll" href="#Y" >Y</a>
    <a class="btn btn-primary page-scroll" href="#Z" >Z</a>
</div>

<div class="id-list-anime mb-2" id="#">
    <div class="title-widget-list"><span class="text-white">#</span></div>
    @foreach ($sd as $sd)
    <a class="float-left text-primary" title="{{ $sd->title_anime }}" href="{{ route('anime.details', ['anime' => $sd->id_anime]) }}">{{ $sd->title_anime }}</a>
    @endforeach
    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="A">
    <div class="title-widget-list"><span class="text-white">A</span></div>
    @foreach ($as as $a)
    <a class="float-left text-primary" title="{{ $a->title_anime }}" href="{{ route('anime.details', ['anime' => $a->id_anime]) }}">{{ $a->title_anime }}</a>
    @endforeach
    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="B">
    <div class="title-widget-list"><span class="text-white">B</span></div>
    @foreach ($bs as $b)
    <a class="float-left text-primary" title="{{ $b->title_anime }}" href="{{ route('anime.details', ['anime' => $b->id_anime]) }}">{{ $b->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="C">
    <div class="title-widget-list"><span class="text-white">C</span></div>
    @foreach ($cs as $c)
    <a class="float-left text-primary" title="{{ $c->title_anime }}" href="{{ route('anime.details', ['anime' => $c->id_anime]) }}">{{ $c->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="D">
    <div class="title-widget-list"><span class="text-white">D</span></div>
    @foreach ($ds as $d)
    <a class="float-left text-primary" title="{{ $d->title_anime }}" href="{{ route('anime.details', ['anime' => $d->id_anime]) }}">{{ $d->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="E">
    <div class="title-widget-list"><span class="text-white">E</span></div>
    @foreach ($es as $e)
    <a class="float-left text-primary" title="{{ $e->title_anime }}" href="{{ route('anime.details', ['anime' => $e->id_anime]) }}">{{ $e->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="F">
    <div class="title-widget-list"><span class="text-white">F</span></div>
    @foreach ($fs as $f)
    <a class="float-left text-primary" title="{{ $f->title_anime }}" href="{{ route('anime.details', ['anime' => $f->id_anime]) }}">{{ $f->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="G">
    <div class="title-widget-list"><span class="text-white">G</span></div>
    @foreach ($gs as $g)
    <a class="float-left text-primary" title="{{ $g->title_anime }}" href="{{ route('anime.details', ['anime' => $g->id_anime]) }}">{{ $g->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="H">
    <div class="title-widget-list"><span class="text-white">H</span></div>
    @foreach ($hs as $h)
    <a class="float-left text-primary" title="{{ $h->title_anime }}" href="{{ route('anime.details', ['anime' => $h->id_anime]) }}">{{ $h->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="I">
    <div class="title-widget-list"><span class="text-white">I</span></div>
    @foreach ($is as $i)
    <a class="float-left text-primary" title="{{ $i->title_anime }}" href="{{ route('anime.details', ['anime' => $i->id_anime]) }}">{{ $i->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="J">
    <div class="title-widget-list"><span class="text-white">J</span></div>
    @foreach ($js as $j)
    <a class="float-left text-primary" title="{{ $j->title_anime }}" href="{{ route('anime.details', ['anime' => $j->id_anime]) }}">{{ $j->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="K">
    <div class="title-widget-list"><span class="text-white">K</span></div>
    @foreach ($ks as $k)
    <a class="float-left text-primary" title="{{ $k->title_anime }}" href="{{ route('anime.details', ['anime' => $k->id_anime]) }}">{{ $k->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="L">
    <div class="title-widget-list"><span class="text-white">L</span></div>
    @foreach ($ls as $l)
    <a class="float-left text-primary" title="{{ $l->title_anime }}" href="{{ route('anime.details', ['anime' => $l->id_anime]) }}">{{ $l->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="M">
    <div class="title-widget-list"><span class="text-white">M</span></div>
    @foreach ($ms as $m)
    <a class="float-left text-primary" title="{{ $m->title_anime }}" href="{{ route('anime.details', ['anime' => $m->id_anime])}}">{{ $m->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="N">
    <div class="title-widget-list"><span class="text-white">N</span></div>
    @foreach ($ns as $n)
    <a class="float-left text-primary" title="{{ $n->title_anime }}" href="{{ route('anime.details', ['anime' => $n->id_anime]) }}">{{ $n->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="O">
    <div class="title-widget-list"><span class="text-white">O</span></div>
    @foreach ($os as $o)
    <a class="float-left text-primary" title="{{ $o->title_anime }}" href="{{ route('anime.details', ['anime' => $o->id_anime]) }}">{{ $o->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="P">
    <div class="title-widget-list"><span class="text-white">P</span></div>
    @foreach ($ps as $p)
    <a class="float-left text-primary" title="{{ $p->title_anime }}" href="{{ route('anime.details', ['anime' => $p->id_anime]) }}">{{ $p->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="Q">
    <div class="title-widget-list"><span class="text-white">Q</span></div>
    @foreach ($qs as $q)
    <a class="float-left text-primary" title="{{ $q->title_anime }}" href="{{ route('anime.details', ['anime' => $q->id_anime]) }}">{{ $q->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="R">
    <div class="title-widget-list"><span class="text-white">R</span></div>
    @foreach ($rs as $r)
    <a class="float-left text-primary" title="{{ $r->title_anime }}" href="{{ route('anime.details', ['anime' => $r->id_anime]) }}">{{ $r->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="S">
    <div class="title-widget-list"><span class="text-white">S</span></div>
    @foreach ($ss as $s)
    <a class="float-left text-primary" title="{{ $s->title_anime }}" href="{{ route('anime.details', ['anime' => $s->id_anime]) }}">{{ $s->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="T">
    <div class="title-widget-list"><span class="text-white">T</span></div>
    @foreach ($ts as $t)
    <a class="float-left text-primary" title="{{ $t->title_anime }}" href="{{ route('anime.details', ['anime' => $t->id_anime]) }}">{{ $t->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="U">
    <div class="title-widget-list"><span class="text-white">U</span></div>
    @foreach ($us as $u)
    <a class="float-left text-primary" title="{{ $u->title_anime }}" href="{{ route('anime.details', ['anime' => $u->id_anime]) }}">{{ $u->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="V">
    <div class="title-widget-list"><span class="text-white">V</span></div>
    @foreach ($vs as $v)
    <a class="float-left text-primary" title="{{ $v->title_anime }}" href="{{ route('anime.details', ['anime' => $v->id_anime]) }}">{{ $v->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="W">
    <div class="title-widget-list"><span class="text-white">W</span></div>
    @foreach ($ws as $w)
    <a class="float-left text-primary" title="{{ $w->title_anime }}" href="{{ route('anime.details', ['anime' => $w->id_anime]) }}">{{ $w->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="X">
    <div class="title-widget-list"><span class="text-white">X</span></div>
    @foreach ($xs as $x)
    <a class="float-left text-primary" title="{{ $x->title_anime }}" href="{{ route('anime.details', ['anime' => $x->id_anime]) }}">{{ $x->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="Y">
    <div class="title-widget-list"><span class="text-white">Y</span></div>
    @foreach ($ys as $y)
    <a class="float-left text-primary" title="{{ $y->title_anime }}" href="{{ route('anime.details', ['anime' => $y->id_anime]) }}">{{ $y->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="id-list-anime mb-2" id="Z">
    <div class="title-widget-list"><span class="text-white">Z</span></div>
    @foreach ($zs as $z)
    <a class="float-left text-primary" title="{{ $z->title_anime }}" href="{{ route('anime.details', ['anime' => $z->id_anime]) }}">{{ $z->title_anime }}</a>
    @endforeach

    <div class="clearfix"></div>
</div>

<div class="clearfix"></div>
@endsection
