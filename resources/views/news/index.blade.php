@extends('../layouts/default')

@section('content')
	@if (Auth::check())
		<div class="container">
			<a href="/news/create">Nieuw artikel toevoegen</a>		
		</div>
	@endif

	@foreach ($news->reverse() as $article)
		<div class="jumbotron" style="padding:0;">
			<h2 style="text-align:center;margin-top:0px;">{{$article->title}}</h2>
			<p style="text-align:center;font-size:10pt";>{{$article->content}}</p>
			<p style="text-align:center;margin-top:10px;font-size:12pt;">Geplaatst op: {{$article->created_at}}</p>
			
			@if (Auth::check())
				{!! Form::open(array('url' => 'news/' . $article->id, ))!!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    <div style="text-align: center;padding-bottom:10px;">
                    {!!Form::submit('Verwijderen', array('class' => 'btn btn warning')) !!}
                    </div>
                {!! Form::close() !!}
			@endif
		</div>
	@endforeach
@endsection
