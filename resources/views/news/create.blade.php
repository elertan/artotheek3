@extends('../layouts/default')

@section('content')

<h1>Artikel Toevoegen</h1>

{!! HTML::ul($errors->all()) !!}
{!! Form::open(array('url' => 'news/store')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Titel') !!}
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Inhoud') !!}
        {!! Form::textarea('content', Input::old('content'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Toevoegen', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}


@endsection