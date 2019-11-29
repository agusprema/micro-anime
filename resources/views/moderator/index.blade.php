@extends('layouts.user')

@section('title', 'Moderator Management')
@section('inc_style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet" type="text/css">
<style>
.counter { background-color: #ffffff; padding: 20px 0; border-radius: 5px; margin-top: 30px;}
.col_fourth { width: 100%;position: relative;display:inline;display: inline-block;float: left;margin-right: 2%;margin-bottom: 20px; }
.count-title { font-size: 40px; font-weight: normal;  margin-top: 10px; margin-bottom: 0; text-align: center; }
.count-text { font-size: 13px; font-weight: normal;  margin-top: 10px; margin-bottom: 0; text-align: center; }
.fa-2x { margin: 0 auto; float: none; display: table; color: #4ad1e5; }
</style>
@endsection
@section('inc_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
{!! $chart->script() !!}
{!! $chart2->script() !!}
{!! $chart3->script() !!}
<script type="text/javascript">
$(document).ready(function() {
    selesai();
});

function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 3000);
}

function update() {
	$.getJSON($('meta[name="url"]').attr('content') +'/api/visitor', function(data) {
		$("#visitor").empty();
		$.each(data, function() {
			var hasil = this['visitors']
			$("#visitor").html(hasil);
        });
	});
}
</script>
@endsection

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Moderator Management</h1>

<div class="row">
    <div class="col-lg">
        @include('partials.alerts')

        <div class="mb-2">
            <div class="col-md-9 float-left">
                {!! $chart3->container() !!}
            </div>
            <div class="col-md-3 float-left">
                <div class="counter col_fourth">
                    <i class="fa fa-users fa-2x"></i>
                    <h2 class="timer count-title" id="visitor">0</h2>
                    <p class="count-text ">User visitor</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="mb-2">
            <div class="col-md-9 float-left">
                {!! $chart->container() !!}
            </div>
            <div class="col-md-3 float-left">
                {!! $chart2->container() !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
