@extends('../layouts/default')

@section('content')
<div class="jumbotron">
	<div class="container">
		<h2>{{ $article->title }}</h1>
		<p>{{ $article->content }}</p>
	</div>
</div>
@endsection
