@extends('../layouts/default')

@section('content')
<h1>Artikel Wijzigen</h1>

{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'news/update/'.$article->id)) !!}

 <div class="form-group">
        {!! Form::label('title', 'Titel') !!}
        {!! Form::text('title', $article->title, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Inhoud') !!}
        {!! Form::textarea('content', $article->content, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Wijzigen', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

@endsection
