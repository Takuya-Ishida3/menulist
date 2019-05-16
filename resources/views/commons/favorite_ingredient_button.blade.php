    @if (Auth::user()->is_favoring_ingredient($ingredient->id))
        {!! Form::open(['route' => ['unfavor.ingredient', $ingredient->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavor', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favor.ingredient', $ingredient->id]]) !!}
            {!! Form::submit('Favor', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
    @endif