    @if(Auth::check())
        @if (Auth::user()->is_favoring($recipe->id))
            {!! Form::open(['route' => ['unfavor.recipe', $recipe->id], 'method' => 'delete']) !!}
                {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger btn-sm"]) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['favor.recipe', $recipe->id]]) !!}
                {!! Form::submit('お気に入り', ['class' => "btn btn-primary btn-sm"]) !!}
            {!! Form::close() !!}
        @endif
    @endif