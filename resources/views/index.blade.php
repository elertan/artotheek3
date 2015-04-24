@extends('layouts/default')

@section('content')
<script>
	$(function () {
		$('#btnArtworks').click(function () {
			window.location.assign('/artwork');
		});
		$('#btnArtists').click(function () {
			window.location.assign('/artist');
		});
	});
</script>
<div class="jumbotron">
	<div class="container">
		<div class="col-md-6">
			<button id="btnArtworks" class="btn btn-default center-block">
				Artworks
			</button>
		</div>
		<div class="col-md-6">
			<button id="btnArtists" class="btn btn-default center-block">
				Artists
			</button>
		</div>
	</div>
</div>
@endsection