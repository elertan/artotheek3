@extends('layouts/default')

@section('content')
@if (!$articles)
	<div class="container">
		<h2>Er is geen nieuws.</h2>
	</div>
@endif
<script type="text/javascript">
	$(function () {
		var token = $('#token-id').find('input[name=_token]').attr('value');

		var newsArticle = $('.news-article');
		var newsArticleBtnRemove = $('.news-article-btn-remove');
		var newsArticleBtnEdit = $('.news-article-btn-edit');
		var newsArticleBtnRead = $('.news-article-btn-read');
		var btnNewArticle = $('#btnNewArticle');

		// Pressed remove btn
		newsArticleBtnRemove.click(function () {
			// Reference elements in variables
			var elemArticle = $(this).parent();
			var articleId = elemArticle.data('article-id');
			var success = confirm('Weet je zeker dat je dit artikel wilt verwijderen?');
			// Pressed ok
			if (success) {
				// Create a request
				var request = $.post('/news/destroy', {
					_token: token,
					id: articleId
				});
				// Successful
				request.success(function (response) {
					// Make the element dissapear slowly.
					elemArticle.fadeOut(600);
					setTimeout(function () { elemArticle.remove() }, 600);
				});
				// Error
				request.error(function (response) {
					alert('Error removing news.')
				});
			}
		});
		// Pressed edit btn
		newsArticleBtnEdit.click(function () {
			var elemArticle = $(this).parent();
			var articleId = elemArticle.data('article-id');
			window.location.assign('/news/' + articleId + '/edit');
		});
		// Pressed read btn
		newsArticleBtnRead.click(function () {
			var elemArticle = $(this).parent();
			var articleId = elemArticle.data('article-id');
			window.location.assign('/news/' + articleId);
		});
		// Pressed new article btn
		btnNewArticle.click(function () {
			window.location.assign('/news/create');
		});
	});
</script>
<div id="token-id">{!! Form::token() !!}</div>
@if (Auth::check())
<button class="btn btn-success" id="btnNewArticle" style="margin: 10px;">+ Nieuw Artikel</button>
@endif
@foreach ($articles as $article)
	<div class="col-md-12 container news-article" style="background: #CCC; margin-top: 20px;" data-article-id="{{ $article->id }}">
		<h2>{{ $article->title }}</h2>
		<p>{{ $article->content }}</p>
		<button class="btn btn-default news-article-btn-read" style="float:right; margin: 10px;">Lees Meer</button>
		@if (Auth::check())
			<button class="btn btn-danger news-article-btn-remove" style="float:right; margin: 10px;">Verwijder</button>
			<button class="btn btn-warning news-article-btn-edit" style="float:right; margin: 10px;">Wijzig</button>
		@endif
	</div>
@endforeach
@endsection