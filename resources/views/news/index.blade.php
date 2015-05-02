@extends('../layouts/default')

@section('content')
	<script type="text/javascript">
	$(function () {
		// Handles the delete function
		var btnDelete = $('.btn-delete');
		btnDelete.click(function () {
			if (confirm('Weet je zeker dat je dit artikel wilt verwijderen?')) {
				$.post('news/' + $(this).data('article-id'), {
					_token: $(this).parent().parent().find('input[name=_token]').attr('value'),
					_method: 'DELETE'
				}, function (data, code) {

				});
				$(this).parent().parent().parent().remove(); // Removes article
			}
		});
	});
	</script>
	@foreach ($news->reverse() as $article)
		<div class="jumbotron" style="padding:0;">
			<h2 style="text-align:center;margin-top:0px;">{{$article->title}}</h2>
			<p style="text-align:center;font-size:10pt";>{{$article->content}}</p>
			<p style="text-align:center;margin-top:10px;font-size:12pt;">Geplaatst op: {{$article->created_at}}</p>
			
			@if (Auth::check())
				<div style="text-align: center;padding-bottom:10px;">
               	 	<a class="btn btn-default" href="news/{{$article->id}}/edit" role="button">Wijzigen</a>
                </div>

				{!! Form::open(array('url' => 'news/' . $article->id ))!!}
                <div style="text-align: center;padding-bottom:10px;">
               		<button type="button" class="btn btn-warning btn-delete" data-article-id="{{ $article->id }}">Verwijderen</button>
                </div>
                {!! Form::close() !!}               
			@endif
		</div>
	@endforeach
@endsection
