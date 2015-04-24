@extends('../layouts/default')

@section('content')
	@foreach ($artworks as $artwork)
		{{ $artwork->artist->name }}
	@endforeach
@endsection