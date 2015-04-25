@extends('../layouts/default')

@section('content')
<script type="text/javascript">
	$(function () {
		$('.img-artwork').click(function () {
			var src = $(this).data('image');
            var img = '<img src="' + src + '" class="img-responsive">\n';
            img += '<p>' + $(this).data('description') + ' door <a href="/artist/' + $(this).data('artist-id') + '">' + $(this).data('artist-name') + '</a></p>\n';
            //img += '<a href="/artist/' + $(this).data('artist-id') + '">Meer van deze artiest</a>\n'
            var dialog = $('#modal-preview');
            dialog.modal();
            dialog.on('shown.bs.modal', function () {
            	dialog.find('.modal-body').html(img);
            });
            dialog.on('hidden.bs.modal', function () {
            	dialog.find('.modal-body').html('');
            });
		});
	});
</script>
<div class="jumbotron">
	<div class="container">
		<h1>Kunstwerken</h1>
	</div>
	<div class="container">
		<input type="text" class="form-control" placeholder="Zoek...">
	</div>
	<div class="container" style="margin-top: 20px;">
		<ul class="row">
			@foreach ($artworks as $artwork)
			<li style="list-style: none; margin-bottom: 25px;" class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img src="{{ $artwork->getGalleryImagePath() }}"  data-image="{{ $artwork->getImagePath() }}" style="cursor: pointer;" data-description="{{ $artwork->description }}" data-artist-id="{{ $artwork->artist->id }}" data-artist-name="{{ $artwork->artist->name }}" class="img-responsive img-artwork"></li>
			@endforeach
		</ul>
	</div>
	<div class="container">
		<a href="/">Terug naar de homepage</a>
	</div>
</div>
</div>
<div class="modal fade" id="modal-preview" tabindex="-1" role="dialog" aria-labelledby="Image" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
