@extends('../layouts/default')

@section('content')
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>ArtistName</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($artworks as $artwork)
			<tr>
				<td>{{ $artwork->name }}</td>
				<td>{{ $artwork->description }}</td>
				<td>{{ $artwork->artist->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection