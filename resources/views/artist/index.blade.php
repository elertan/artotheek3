@extends('../layouts/default')

@section('content')
<script>
	$(function () {
		$('.btn-artist').click(function () {
			window.location.assign('/artist/' + $(this).data('artist-id'));
		});
	});
</script>
<div class="jumbotron">
	<div class="container">
		@foreach ($artists as $artist)
		<div class="container">
			<button data-artist-id="{{ $artist->id }}" class="btn btn-default btn-artist" style="margin: 10px;">{{ $artist->name }}</button>
		</div>
		@endforeach
	</div>
	<div class="container">
		<a href="/">Terug naar de homepage</a>
	</div>
</div>
@endsection