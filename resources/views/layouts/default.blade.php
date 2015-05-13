<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artotheek</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<script src="{{ asset('assets/jquery/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<script>
	$(function () {
		$('#btnHome').click(function () {
			window.location.assign('/');
		});
		$('#btnArtworks').click(function () {
			window.location.assign('/artwork');
		});
		$('#btnArtists').click(function () {
			window.location.assign('/artist');
		});
		$('#btnNews').click(function () {
			window.location.assign('/news');
		});
	});
</script>
</head>
<body>
@if (Auth::check())
    <div class="jumbotron">
    <h4>Administration Tools</h4>
        <div class="container">
            <a href="/auth/logout/" style="float:right;">Logout</a>
        </div>
    </div>
@endif
<div class="jumbotron">
	<div class="container">
		<div class="col-md-3">
			<button id="btnHome" class="btn btn-default center-block">
				Home
			</button>
		</div>
		<div class="col-md-3">
			<button id="btnArtworks" class="btn btn-default center-block">
				Artworks
			</button>
		</div>
		<div class="col-md-3">
			<button id="btnArtists" class="btn btn-default center-block">
				Artists
			</button>
		</div>
		<div class="col-md-3">
			<button id="btnNews" class="btn btn-default center-block">
				Nieuws
			</button>
		</div>

	</div>
</div>
	@yield('content')
</body>
</html>
