@extends('../layouts/default')

@section('content')
    <div class="jumbotron">
        <div class="container">
            {!! Form::open(['url' => 'artwork/create', 'class' => 'form']) !!}
                <div class="form-section">
                    {!! Form::label('Selecteer een artiest:') !!}
                    {!! Form::select('artist-id', [
                    	'1' => 'Mark',
                    	'2' => 'Sloerie'
              		]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
