    @if (Auth::user()->is_favoring_ingredient($ingredient->id))
        {!! Form::open(['route' => ['unfavor.ingredient', $ingredient->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger btn-sm btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favor.ingredient', $ingredient->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-primary btn-sm btn-block"]) !!}
        {!! Form::close() !!}
    @endif