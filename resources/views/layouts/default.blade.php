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
		$('#btnArtworks').click(function () {
			window.location.assign('/artwork');
		});
		$('#btnArtists').click(function () {
			window.location.assign('/artist');
		});
	});
</script>
</head>
<body>
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
	@yield('content')
</body>
</html>