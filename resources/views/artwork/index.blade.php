@extends('../layouts/default')

@section('content')
<script type="text/javascript">
	$(function () {
        var getImageByButton = function (btn) {
            return btn.parent().find('.img-artwork');
        }
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
        $('.artwork-btn-archive').click(function () {
            var img = getImageByButton($(this));
            var request = $.post('/artwork/set-state', {
                _method: 'POST',
                _token: '{{ csrf_token() }}',
                id: img.data('artist-id'),
                newstate: 0
            });
            request.success(function (response) {
                window.location.reload();
            });
            request.error(function (response) {
                alert('Error archiving image!');
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
        <h3>Published</h3>
		<ul class="row">
            @foreach ($artworks as $artwork)
                @if ($artwork->state == 2)
                    <li style="list-style: none; margin-bottom: 25px;" class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img src="{{ $artwork->getGalleryImagePath() }}"  data-image="{{ $artwork->getImagePath() }}" style="cursor: pointer;" data-description="{{ $artwork->description }}" data-artist-id="{{ $artwork->artist->id }}" data-artist-name="{{ $artwork->artist->name }}" class="img-responsive img-artwork">
                    @if (Auth::check())
                    <button class="btn btn-warning artwork-btn-archive">Archiveer</button>
                    <button class="btn btn-danger artwork-btn-remove">Verwijder</button>
                    @endif
                </li>
                @endif
			@endforeach
        </ul>
        @if (Auth::check())
        <h3>Pending</h3>
		<ul class="row">
			@foreach ($artworks as $artwork)
	                @if ($artwork->state == 1)
                    <li style="list-style: none; margin-bottom: 25px;" class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img src="{{ $artwork->getGalleryImagePath() }}"  data-image="{{ $artwork->getImagePath() }}" style="cursor: pointer;" data-description="{{ $artwork->description }}" data-artist-id="{{ $artwork->artist->id }}" data-artist-name="{{ $artwork->artist->name }}" class="img-responsive img-artwork">
                    <button class="btn btn-success artwork-btn-accept">Accepteer</button>
                    <button class="btn btn-warning artwork-btn-archive">Archiveer</button>
                    <button class="btn btn-danger artwork-btn-remove">Verwijder</button>
                    </li>
                    @endif
			@endforeach
		</ul>
        <h3>Archived</h3>
		<ul class="row">
            @foreach ($artworks as $artwork)
                @if ($artwork->state == 0)
                    <li style="list-style: none; margin-bottom: 25px;" class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img src="{{ $artwork->getGalleryImagePath() }}"  data-image="{{ $artwork->getImagePath() }}" style="cursor: pointer;" data-description="{{ $artwork->description }}" data-artist-id="{{ $artwork->artist->id }}" data-artist-name="{{ $artwork->artist->name }}" class="img-responsive img-artwork">
                    <button class="btn btn-success artwork-btn-accept">Publiceer</button>
                    <button class="btn btn-danger artwork-btn-remove">Verwijder</button>
                    </li>
                @endif
			@endforeach
		</ul>
        @endif
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
