@extends('../layouts/default')

@section('content')

	@foreach ($news as $article)
		<div class="jumbotron">
			<h2 style="text-align:center;margin-top:0px;">{{$article->title}}</h2>
			{{$article->content}}
		</div>
	@endforeach
	
@endsection
