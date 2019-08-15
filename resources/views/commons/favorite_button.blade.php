    @if(Auth::check())
        @if (Auth::user()->is_favoring($recipe->id))
            {!! Form::open(['route' => ['unfavor.recipe', $recipe->id], 'method' => 'delete']) !!}
                {!! Form::submit('Unfavor', ['class' => "btn btn-danger"]) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['favor.recipe', $recipe->id]]) !!}
                {!! Form::submit('Favor', ['class' => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        @endif
    @endif